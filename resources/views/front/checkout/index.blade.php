@extends('front.layout.master')

@section('title', 'Checkout')

@section('body')
    <!-- Breadcrumb Section start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop">Shop</a>
                        <a href="/cart">Cart</a>
                        <span>Check out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section end -->

    <!-- Checkout Section begin -->
    <div class="checkout-section spad">
        <div class="container">
            <form action="" method="post" class="checkout-form">
                @csrf
                <div class="row">
                    @if(Cart::count() > 0)
                    <div class="col-lg-6">
                        @if(!Auth::user())
                        <div class="checkout-content">
                            <a href="/account/login" class="content-btn login-checkout">Click Here To Login</a>
                        </div>
                        @endif
                        <h4>Billing Details</h4>
                        <div class="row">

                            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id ?? ''}}">

                            <div class="col-lg-6">
                                <label for="fname">First Name <span>*</span></label>
                                <input required type="text" name="first_name" id="fname" value="{{Auth::user()->name ?? ''}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="lname">Last Name <span>*</span></label>
                                <input required type="text" name="last_name" id="lname" value="{{Auth::user()->lastname ?? ''}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cpnname">Company Name</label>
                                <input type="text" name="company_name" id="cpnname" value="{{Auth::user()->company_name ?? ''}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="ctr">Country <span>*</span></label>
                                <input required type="text" name="country" id="ctr" value="{{Auth::user()->country ?? ''}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="str">Street Address <span>*</span></label>
                                <input required type="text" name="street_address" id="str" class="street-first" value="{{Auth::user()->street_address ?? ''}}">
                                <label for="postcode">Postal Code <span>*</span></label>
                                <input required type="text" name="postcode_zip" id="postcode" value="{{Auth::user()->postcode_zip ?? ''}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City <span>*</span></label>
                                <input required type="text" name="town_city" id="town" value="{{Auth::user()->town_city ?? ''}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email <span>*</span></label>
                                <input required type="text" name="email" id="email" value="{{Auth::user()->email ?? ''}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone Number <span>*</span></label>
                                <input required type="text" name="phone" id="phone" value="{{Auth::user()->phone ?? ''}}">
                            </div>
                            @if(!Auth::user())
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Need a new account?
                                        <input type="checkbox" name="" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Order Details</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>

                                    @foreach($cartItems as $cartItem)
                                    <li class="fw-normal">
                                        {{$cartItem->name}} x {{$cartItem->qty}}
                                        <span>${{number_format($cartItem->price * $cartItem->qty, 2)}}</span>
                                    </li>
                                    @endforeach

                                    <li class="fw-normal sub-total">Subtotal <span>${{$subtotal}}</span></li>
                                    <li class="total-price">Final Total <span>${{$total}}</span></li>
                                </ul>
                                <div class="checkout-content coupon-input">
                                    <input type="text" placeholder="Enter your coupon code" name="" id="">
                                </div>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-cod">
                                            Cash On Delivery
                                            <input type="radio" name="payment_type" value="cod" id="pc-cod" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-vnpay">
                                            VN PAY
                                            <input type="radio" name="payment_type" value="vnpay" id="pc-vnpay">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-lg-12">
                        <h4>Your cart is empty… Why not <a style="" href="/shop">check some out</a>!</h4>
                    </div>
                @endif
            </form>
        </div>
    </div>
    <!-- Checkout Section end -->
@endsection
