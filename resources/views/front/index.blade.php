@extends('front.layout.master')

@section('title', 'Home')

@section('body')
    <!-- Hero Section begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <a href="shop/category/Kids">
                <div class="single-hero-items set-bg" data-setbg="front/img/hero3.png">
                </div>
            </a>
            <a href="shop/category/Men">
                <div class="single-hero-items set-bg" data-setbg="front/img/hero2.webp">
                    {{--                <div class="container">--}}
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-lg-5 offset-7">--}}
                    {{--                            <span>Men's style</span>--}}
                    {{--                            <h1>ABC DEF</h1>--}}
                    {{--                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos blanditiis ipsum laboriosam perspiciatis laborum labore officiis doloremque alias dolorum, molestiae expedita itaque voluptatum! A distinctio temporibus, nesciunt minima tempore eveniet?</p>--}}
                    {{--                            <a href="#" class="primary-btn">Shop Now</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
            </a>
            <div class="single-hero-items set-bg" data-setbg="front/img/hero1_auto_x2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Featured, Women</span>
                            <h1>Super Sales</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos blanditiis ipsum laboriosam perspiciatis laborum labore officiis doloremque alias dolorum, molestiae expedita itaque voluptatum! A distinctio temporibus, nesciunt minima tempore eveniet?</p>
                            <a href="shop/category/Women" class="primary-btn">Shop Now</a>
                        </div>
{{--                        <div class="off-card">--}}
{{--                            <h2>Sale <span>50%</span></h2>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section end -->

    <!-- Banner Section begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-1.png" alt="">
                        <div class="inner-text">
                            <a id="btn-men" href="shop/category/Men">Men's</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-2.png" alt="">
                        <div class="inner-text">
                            <a id="btn-women" href="shop/category/Women">Women's</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-3.png" alt="">
                        <div class="inner-text">
                            <a id="btn-kids" href="shop/category/Kids">Kid's</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section end -->

    <!-- Women Banner Section begin -->
    <div class="women-banner spad">
        <div class="container-fluid women-promo">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/women-promo.png">
                        <h2>Women's</h2>
                        <a href="#">Discover more</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="item active" data-tag="*" data-category="women">All</li>
                            <li class="item" data-tag=".Clothing" data-category="women">Clothing</li>
                            <li class="item" data-tag=".Handbag" data-category="women">Handbag</li>
                            <li class="item" data-tag=".Shoes" data-category="women">Shoes</li>
                            <li class="item" data-tag=".Accessories" data-category="women">Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel women">
                        @foreach($featuredProducts['women'] as $product)
                            @include('front.components.product-item')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Women Banner Section end -->

    <!-- Deal of the Week Section begin -->
    <section id="deal-section" class="deal-of-week set-bg spad" data-setbg="front/img/special-promo.png">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hours</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mininutes</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Seconds</p>
                    </div>
                </div>
                <a class="primary-btn" href="shop">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal of the Week Section begin -->

    <!-- Men Banner Section begin -->
    <div class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="item active" data-tag="*" data-category="men">All</li>
                            <li class="item" data-tag=".Clothing" data-category="men">Clothing</li>
                            <li class="item" data-tag=".Handbag" data-category="men">Handbag</li>
                            <li class="item" data-tag=".Shoes" data-category="men">Shoes</li>
                            <li class="item" data-tag=".Accessories" data-category="men">Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel men">
                        @foreach($featuredProducts['men'] as $product)
                            @include('front.components.product-item')
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg" data-setbg="front/img/men-promo.png">
                        <h2>Men's</h2>
                        <a href="#">Discover more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Men Banner Section end -->

    <!-- Latest Blog Section begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Our News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="front/img/blog/{{$blog->image}}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <div class="tag-item">
                                        <i class="fa fa-calendar-o"></i>
                                        {{date('d-m-Y', strtotime($blog->created_at))}}
                                    </div>
                                    <div class="tag-item">
                                        <i class="fa fa-comment-o"></i>
                                        {{count($blog->blogComments)}}
                                    </div>
                                </div>
                                <a href=""><h4>{{$blog->title}}</h4></a>
                                <p>{{$blog->subtitle}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>FREE SHIPPING</h6>
                                <p>For orders over $99.99</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>DELIVERY ON TIME</h6>
                                <p>Even on Weekends</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>FLEXIBLE PAYMENT</h6>
                                <p>We accept COD</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section end -->
    @if(session('loggedInNotification'))
        <script>
            alert('{{ session('loggedInNotification') }}');
        </script>
    @endif
    <script>
        // Lấy tham chiếu đến phần tử section
        var section = document.getElementById('deal-section');

        // Thêm sự kiện click để chuyển hướng khi nhấn vào phần tử section
        section.addEventListener('click', function() {
            window.location.href = '/shop';
        });
    </script>
@endsection
