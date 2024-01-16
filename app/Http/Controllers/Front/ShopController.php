<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Brand\BrandServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\ProductComment\ProductCommentServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $produdctCategoryService;
    private $brandService;

    public function __construct(ProductServiceInterface $productService,
                                ProductCommentServiceInterface $productCommentService,
                                ProductCategoryServiceInterface $produdctCategoryService,
                                BrandServiceInterface $brandService)
    {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->produdctCategoryService = $produdctCategoryService;
        $this->brandService = $brandService;
    }

    public function show($id)
    {
        $categories = $this->produdctCategoryService->all();
        $brands = $this->brandService->all();
        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);

        $cartItems = Cart::content();
        $rowId = '';
        $itemQTY = 1;
        foreach ($cartItems as $cartItem) {
            if($cartItem->id == $id) {
                $rowId = $cartItem->rowId;
                $itemQTY = $cartItem->qty;
                break;
            }
        }
        return view('front.shop.product', compact('product', 'relatedProducts', 'categories', 'brands', 'rowId', 'itemQTY'));
    }

    public function postComment(Request $request)
    {
        $this->productCommentService->create($request->all());
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $categories = $this->produdctCategoryService->all();
        $brands = $this->brandService->all();
        $products = $this->productService->getProductsOnIndex($request);

        return view('front.shop.index', compact('products', 'categories', 'brands'));
    }

    public function category($categoryName, Request $request)
    {
        $categories = $this->produdctCategoryService->all();
        $brands = $this->brandService->all();
        $products = $this->productService->getProductsByCategory($categoryName ,$request);
        return view('front.shop.index', compact('products', 'categories', 'brands'));
    }
}
