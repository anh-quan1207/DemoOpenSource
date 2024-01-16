@extends('front.layout.master')

@section('title', 'Result')

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
            <div class="row">
                <div class="col-lg-12">
                    <h4>{{$notification}}</h4>
                    <h4><a href="/shop" class="primary-btn mt-5">Continue Shopping</a></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Section end -->
@endsection
