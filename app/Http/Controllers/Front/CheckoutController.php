<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use DateInterval;
use DateTime;
use DateTimeZone;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    private $orderService;
    private $orderDetailService;
    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface  $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService =$orderDetailService;
    }

    public function index()
    {
        $cartItems = Cart::content();
        $subtotal = Cart::subtotal();
        $total = Cart::total();

        return view('front.checkout.index', compact('cartItems', 'subtotal', 'total'));
    }

    private function generateOrderID()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 5; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function createOrder(Request $request)
    {
        //1. Khởi tạo đơn hàng
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;

        $order = $this->orderService->create($data);

//        var_dump($order);

        //2. Thêm thông tin đơn hàng
        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cartItem->id,
                'qty' => $cartItem->qty,
                'amount' => $cartItem->price,
                'total' => $cartItem->qty * $cartItem->price,
            ];

            $this->orderDetailService->create($data);
        }

        if($request->payment_type == 'cod') {
            //*Gửi email
            $subtotal = Cart::subtotal();
            $total = Cart::total();

            $this->sendEMail($order, $subtotal, $total);
            //3. Xoá giỏ hàng
            Cart::destroy();

            //4. Trả về kết quả
            return redirect('checkout/result')->with('notification', 'Order placed! Check your email for more details!');
        }else{ //Hiện tại đặt là Paypal, cần sửa sau
            //1. Khởi tạo URL VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id . '_' . $this->generateOrderID(), //ID đơn hàng
                'vnp_OrderInfo' => 'Mô tả đơn hàng, sửa tuỳ ý //Quang',
                'vnp_Amount' => Cart::total(0, '', '') * 23695, //Tổng thiệt hại đơn hàng, lấy tỉ giá 1USD = 23.695VND
            ]);
            //2. Chuyển hướng tới URL vừa tạo
            return redirect()->to($data_url);
        }
    }

    public function vnPayCheck(Request $request)
    {
        //1. Lấy data từ URL do VNPay gửi về qua $vnp_Returnurl
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi -> 00 = Thành công
        $orderID = explode('_', $request->get('vnp_TxnRef'))[0]; //order id
        $vnp_Amount = $request->get('vnp_Amount'); //Số tiền thanh toán

        //2. Kiểm tra data, kết quả giao dịch trả về hợp lệ
        if($vnp_ResponseCode != null) {
            if($vnp_ResponseCode == 00) { //Thành công
                //Update Order status
                $this->orderService->update([
                    'status' => Constant::order_status_Paid
                ], $orderID);

                //*Gửi email
                $order = $this->orderService->find($orderID);
                $subtotal = Cart::subtotal();
                $total = Cart::total();

                $this->sendEMail($order, $subtotal, $total);
                //Xoá giỏ hàng
                    Cart::destroy();
                //Trả về kết quả
                return redirect('checkout/result')->with('notification', 'Order placed! Check your email for more details!');
            }else {
                //Xoá đơn hàng đã thêm vào database
                $this->orderService->delete($orderID);
                //Thông báo lỗi
                return redirect('checkout/result')->with('notification', 'Payment failed or Canceled, please try again!');
            }
        }
    }

    public function result()
    {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    private function sendEMail($order, $subtotal, $total)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $email_to = $order->email;
        $createdDateTime = new DateTime($order->created_at, new DateTimeZone('Asia/Ho_Chi_Minh'));
        $createdDateTime->add(new DateInterval('P3D'));
        $updatedTimestamp = $createdDateTime->format('d/m/Y H:i');

        Mail::send('front.checkout.email2',
            compact('order', 'subtotal', 'total', 'updatedTimestamp'),
            function ($message) use ($email_to){
                $message->from('ptm22022002@gmail.com', 'Manh/Nhom1');
                $message->to($email_to, $email_to);
                $message->subject('Order Confirmation');
        });
    }
}
