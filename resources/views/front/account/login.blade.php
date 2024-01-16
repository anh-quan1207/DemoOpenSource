@extends('front.layout.master')

@section('title', 'Login')

@section('body')
    <!-- Breadcrumb Section start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section end -->

    <!-- Login Section begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login to continue</h2>

                        @if(session('notification'))
                            <div class="alert alert-warning" role="alert" style="text-align: center">
                                {{session('notification')}}
                            </div>
                        @endif

                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="email">Email address</label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <div class="group-input">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required>
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="remember">
                                        Save Password
                                        <input type="checkbox" name="remember" id="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forgot your Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="/account/register" class="or-login">Create a new account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section end -->
@endsection
