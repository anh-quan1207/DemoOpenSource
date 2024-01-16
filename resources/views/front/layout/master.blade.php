<!DOCTYPE html>
<html lang="vi">

<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@1.0.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include Toastr library CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
    <link rel="stylesheet" href="front/css/toastr.css" type="text/css">
    <link rel="stylesheet" href="front/css/empty-cart.css" type="text/css">
</head>

<body>
<!-- Start coding here -->
<div id="preloader">
    <div class="loader"></div>
</div>

<!-- Header Section begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:ptm22022002@gmail.com" style="color: black;">ptm22022002@gmail.com</a>
                </div>
                <div class="phone-service">
                    <i class="fa fa-phone"></i>
                    <a href="tel:0352276941" style="color: black;">+84 352276941</a>
                </div>
            </div>
            <div class="ht-right">

                @if(Auth::check())
                    <a href="/account/logout" class="login-panel">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        {{Auth::user()->name}} - Logout
                    </a>
                @else
                    <a href="/account/login" class="login-panel">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        Login
                    </a>
                @endif

                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width: 350px;">
                        <option value="vi" data-image="front/img/flag-vn2.png" data-imagecss='flag yt' data-title="Vietnamese">Tiếng Việt</option>
                        <option value="yt" data-image="front/img/flag-1.jpg" data-imagecss='flag yt' data-title="English">English</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2 logo-row">
                    <div class="logo">
                        <a href="/">
                            <img src="front/img/logo.png" height="108" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <form action="/shop">
                        <div class="advanced-search">
                            <div class="input-group">
                                <input name="search" value="{{request('search')}}" type="text" placeholder="Tìm theo tên sản phẩm">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-md-2 text-right">
                    <ul class="nav-right">
                        @if(Auth::user())
                        <li class="profile-icon">
                            <a href="account/profile">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg
                            </a>
                        </li>
                        @endif
                        <li class="cart-icon">
                            <a href="/cart">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                <span class="cart-count">{{Cart::count()}}</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                        @foreach(Cart::content() as $cartItem)
                                        <tr data-rowId="{{$cartItem->rowId}}">
                                            @php
                                                $imagePath = 'front/img/products/' . ($cartItem->options->images[0]->path ?? '_default-product.jpg');
                                            @endphp
                                            <td class="si-pic"><img style="height: 70px; margin: auto" src="{{ file_exists($imagePath) ? $imagePath : 'front/img/products/_default-product.jpg'}}" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p class="in-cart-details">${{number_format($cartItem->price, 2)}} x {{$cartItem->qty}}</p>
                                                    <h6>{{$cartItem->name}}</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i onclick="removeCartItem('{{$cartItem->rowId}}', '{{$cartItem->name}}')" class="ti-close"></i>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>Total: </span>
                                    <h5><b>${{Cart::total()}}</b></h5>
                                </div>
                                <div class="select-button">
                                    <a href="/cart" class="primary-btn view-cart">VIEW CART</a>
                                    <a href="/checkout" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price"><b>${{Cart::total()}}</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All Categories</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="#">Women's Clothing</a></li>
                        <li><a href="#">Men's Clothing</a></li>
                        <li><a href="#">Underwear</a></li>
                        <li><a href="#">Kid's Clothing</a></li>
                        <li><a href="#">Brand Collections</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Luxury Brands</a></li>
                        <li><a href="#">Brand Outdoor Appeal</a></li>
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="{{(request()->segment(1)=='')?'active':''}}"><a href="/">Home</a></li>
                    <li class="{{(request()->segment(1)=='shop')?'active':''}}"><a href="/shop">Shop</a></li>
                    <li class="{{(request()->segment(1)=='blog')?'active':''}}"><a href="/blog">Blog</a></li>
                    <li class="{{(request()->segment(1)=='contact')?'active':''}}"><a href="/contact">Contact</a></li>
                    <li class="{{(request()->segment(1)=='faq')?'active':''}}"><a href="/faq">FAQ</a></li>
                    <li><a href="">OTHERS</a>
                        <ul class="dropdown">
                            <li><a href="/cart">Shopping Cart</a></li>
                            <li><a href="/checkout">Checkout</a></li>
                            @if(!Auth::check())
                                <li><a href="/account/register">Register</a></li>
                                <li><a href="/account/login">Login</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header Section end -->

{{--Body here--}}
@yield('body')

<!-- Partner Logo Section begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/621f6a50b3ef6d5af89592b4_logo-backmarket.svg" loading="lazy" width="172" height="22" alt="BackMarket Logo" class="companies-list-area-logo">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/621f6a504c38c8873d8fc0fb_logo-dolead.svg" loading="lazy" width="128" height="22" alt="Dolead logo" class="dolead-logo companies-list-area-logo">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/621f6a506262781421871d8d_logo-trustfolio.svg" loading="lazy" width="133" height="30" alt="Trustfolio logo" class="trustfolio-logo companies-list-area-logo">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/621f6a50753bc64f543810b5_logo-karos.svg" loading="lazy" width="145" height="26" alt="Karos logo" class="karos-logo companies-list-area-logo">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/62593e2f8d74f06cce66d276_logo-doordash.svg" loading="lazy" width="216" height="25" alt="Logo Doordash" class="companies-list-area-logo">
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="companies-list-area">--}}
{{--    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/621f6a50b3ef6d5af89592b4_logo-backmarket.svg" loading="lazy" width="172" height="22" alt="BackMarket Logo" class="companies-list-area-logo">--}}
{{--    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/621f6a504c38c8873d8fc0fb_logo-dolead.svg" loading="lazy" width="128" height="22" alt="Dolead logo" class="dolead-logo companies-list-area-logo">--}}
{{--    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/621f6a506262781421871d8d_logo-trustfolio.svg" loading="lazy" width="133" height="30" alt="Trustfolio logo" class="trustfolio-logo companies-list-area-logo">--}}
{{--    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/621f6a50753bc64f543810b5_logo-karos.svg" loading="lazy" width="145" height="26" alt="Karos logo" class="karos-logo companies-list-area-logo">--}}
{{--    <img src="https://uploads-ssl.webflow.com/6214efb2d4b5d94158f2ff03/62593e2f8d74f06cce66d276_logo-doordash.svg" loading="lazy" width="216" height="25" alt="Logo Doordash" class="companies-list-area-logo">--}}
{{--</div>--}}
<!-- Partner Logo Section end -->

<!-- Footer Section begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="/">
                            <img src="front/img/_footer-logo.png" height="25" alt="">
                        </a>
                    </div>
                    <ul>
                        <li>Nhom 4 PMMNM</li>
                        <li>Mail: <a href="mailto:ptm22022002@gmail.com" style="color: #a1acb1;">ptm22022002@gmail.com</a></li>
                        <li>Phone: <a href="tel:0352276941" style="color: #a1acb1;">0352276941</a></li>
                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-github"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>INFORMATION</h5>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Checkout</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>ACCOUNT</h5>
                    <ul>
                        <li><a href="">My Account</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Shopping Cart</a></li>
                        <li><a href="">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newsletter-item">
                    <h5>Opt-in Newseletter</h5>
                    <p>Get updates about our latest offers</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Your email">
                        <button type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        Copyright @
                        <script>document.write(new Date().getFullYear());</script>
                        Made by N4 with ♥!
                    </div>
                    <div class="payment-pic">
                        <img src="front/img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section end -->
<button id="scrollToTopBtn" title="Go to top">Top</button>
<!-- Js Plugins -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery-ui.min.js"></script>
<script src="front/js/jquery.countdown.min.js"></script>
<script src="front/js/jquery.nice-select.min.js"></script>
<script src="front/js/jquery.zoom.min.js"></script>
<script src="front/js/jquery.dd.min.js"></script>
<script src="front/js/jquery.slicknav.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/main.js"></script>
<script src="front/js/owlcarousel2-filter.min.js"></script>
<!-- Include Toastr library JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/stylus/0.59.0/stylus.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");

        window.addEventListener("scroll", function() {
            if (window.scrollY > 100) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        });

        scrollToTopBtn.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    });

    /*-------------------
    Toast Notification
    --------------------- */
    toastr.options = {
        "positionClass": "toast-bottom-right", // Vị trí thông báo
        "closeButton": true, // Hiển thị nút đóng
        "progressBar": true, // Hiển thị thanh tiến trình
        "timeOut": 3000, // Thời gian hiển thị (ms)
        "extendedTimeOut": 1000, // Thời gian hiển thị thêm (ms)
        // ... Các tùy chọn khác ...
    };

</script>
</body>

</html>

