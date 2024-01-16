@extends('front.layout.master')

@section('title', 'Cart')

@section('body')
    <!-- Breadcrumb Section start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section end -->

    <!-- Shopping Cart Section begin -->
    <div class="shopping-cart spad">
        <div class="container">
            @if(Cart::count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th style="background: #ff8080; cursor: pointer" onclick="confirm('Are you sure to remove all the items in the cart?') === true ? destroyCart() : ''">CLEAR</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $cartItem)
                                <tr data-rowid="{{$cartItem->rowId}}">
                                    @php
                                        $imagePath = 'front/img/products/' . ($cartItem->options->images[0]->path ?? '_default-product.jpg');
                                    @endphp
                                    <td class="cart-pic first-row"><img style="height: 170px; margin: auto" src="{{ file_exists($imagePath) ? $imagePath : 'front/img/products/_default-product.jpg'}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$cartItem->name}}</h5>
                                    </td>
                                    <td class="p-price first-row">${{number_format($cartItem->price, 2)}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$cartItem->qty}}" data-rowid="{{$cartItem->rowId}}" name="" id="">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">${{number_format($cartItem->price * $cartItem->qty, 2)}}</td>
                                    <td class="close-td first-row">
                                        <i onclick="removeCartItem('{{$cartItem->rowId}}', '{{$cartItem->name}}')" class="ti-close"></i>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="/shop" class="primary-btn continue-shop">Continue Shopping</a>
                                <a href="/cart" class="primary-btn up-cart">Update Cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Code</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your code" name="" id="">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="discount-coupon">
                                <h6>Discount Code</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your code" name="" id="">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>${{$subtotal}}</span></li>
                                    <li class="cart-total">Total <span>${{$total}}</span></li>
                                </ul>
                                <a href="/checkout" class="proceed-btn">CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                @include('front.shop.empty-cart')
            @endif
        </div>
    </div>
    <!-- Shopping Cart Section end -->
@endsection
