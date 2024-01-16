@extends('front.layout.master')

@section('title', 'Register')

@section('body')
    <!-- Breadcrumb Section start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/account/login">Login</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section end -->

    <!-- Register Section begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Create a new account</h2>
                        @if(session('notification'))
                            <div class="alert alert-warning" role="alert" style="text-align: center">
                                {{session('notification')}}
                            </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="name">Name <span style="color: red;">*</span></label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="group-input">
                                <label for="email">Email address <span style="color: red;">*</span></label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="group-input">
                                <label for="password">Password <span style="color: red;">*</span></label>
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="group-input">
                                <label for="cf-password">Confirm Password <span style="color: red;">*</span></label>
                                <input type="password" name="password_confirmation" id="cf-password">
                            </div>
                            <button type="submit" class="site-btn register-btn">Register</button>
                        </form>
                        <div class="switch-login">
                            <a href="/account/login" class="or-login">Back to login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navitem = document.querySelector(".nav-item");
            if (navitem) {
                var navitemPosition = navitem.getBoundingClientRect().top + window.scrollY;

                // Cuộn tự động đến vị trí breadcrumb
                function scrollToNavItem() {
                    window.scrollTo({
                        top: navitemPosition,
                        behavior: 'smooth'
                    });
                }

                // Gọi hàm scrollToBreadcrumb khi trang tải xong
                scrollToNavItem();
            }
        });
    </script>
    <!-- Register Section end -->
@endsection
