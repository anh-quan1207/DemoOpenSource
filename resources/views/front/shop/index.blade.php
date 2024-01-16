@extends('front.layout.master')

@section('title', 'Shop')

@section('body')
    <!-- Breadcrumb Section start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section end -->

    <!-- Product Shop Section begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 products-sidebar-filter">
                    @include('front.shop.components.product-sidebar-filter')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-12 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select class="sorting" name="sort" onchange="this.form.submit();" id="">
                                            <option {{request('sort') == 'newest'?'selected':''}} value="newest">
                                                Sorting: Newest
                                            </option>
                                            <option {{request('sort') == 'oldest'?'selected':''}} value="oldest">
                                                Sorting: Oldest
                                            </option>
                                            <option
                                                {{request('sort') == 'price-ascending'?'selected':''}} value="price-ascending">
                                                Sorting: Price Low-High
                                            </option>
                                            <option
                                                {{request('sort') == 'price-descending'?'selected':''}} value="price-descending">
                                                Sorting: Price High-Low
                                            </option>
                                            <option
                                                {{request('sort') == 'name-ascending'?'selected':''}} value="name-ascending">
                                                Sorting: Name A-Z
                                            </option>
                                            <option
                                                {{request('sort') == 'name-descending'?'selected':''}} value="name-descending">
                                                Sorting: Name Z-A
                                            </option>
                                        </select>
                                        <select class="p-show" name="show" onchange="this.form.submit();" id="">
                                            <option {{request('show') == '9'?'selected':''}} value="9">Show: 9</option>
                                            <option {{request('show') == '3'?'selected':''}} value="3">Show: 3</option>
                                            <option {{request('show') == '15'?'selected':''}} value="15">Show: 15
                                            </option>
                                        </select>
                                        <a href="/shop" class="primary-btn" style="height: 40px; margin-left: 20px; padding: 9px 30px;">Clear Filter</a>
                                    </div>
                                </form>
                            </div>
{{--                            <div class="col-lg-5 col-md-5 text-right"></div>--}}
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    @include('front.components.product-item')
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section end -->
@endsection
