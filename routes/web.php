<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;

Route::get('/', [Front\HomeController::class, 'index']);
//Route::get('/',function (ProductRepositoryInterface $productRepository) {
//    return $productRepository->all();
//});

//Route::get('/',function (ProductServiceInterface $productService) {
//    return $productService->all();
//});

Route::prefix('shop')->group(function () {
    Route::get('', [Front\ShopController::class,'index']);
    Route::get('product/{id}', [Front\ShopController::class,'show']);
    Route::get('/category/{categoryName}', [Front\ShopController::class,'category']);
    Route::post('product/{id}', [Front\ShopController::class,'postComment']);
});

Route::prefix('blog')->group(function () {
    Route::get('', [Front\BlogController::class,'index']);
});

Route::prefix('contact')->group(function () {
    Route::get('/',function () {
        return view('front.contact.index');
    });
});

Route::prefix('faq')->group(function () {
    Route::get('/',function () {
        return view('front.faq.index');
    });
});

Route::prefix('cart')->group(function () {
    Route::get('/', [Front\CartController::class, 'index']);
    Route::get('add', [Front\CartController::class, 'add']);
    Route::get('update', [Front\CartController::class, 'update']);
    Route::get('delete', [Front\CartController::class, 'delete']);
    Route::get('destroy', [Front\CartController::class, 'destroy']);
});

Route::prefix('checkout')->group(function () {
    Route::get('', [Front\CheckoutController::class, 'index']);
    Route::post('/', [Front\CheckoutController::class, 'createOrder']);
    Route::get('result', [Front\CheckoutController::class, 'result']);
    Route::get('vnPayCheck', [Front\CheckoutController::class, 'vnPayCheck']);
//    Route::get('sendEmail', [Front\CheckoutController::class, 'vnPayCheck']);
});

Route::prefix('account')->group(function () {
    Route::get('login', [Front\AccountController::class, 'login']);
    Route::post('login', [Front\AccountController::class, 'checkLogin']);
    Route::get('profile', [Front\AccountController::class, 'profile']);
    Route::put('profile', [Front\AccountController::class, 'updateProfile']);
    Route::get('logout', [Front\AccountController::class, 'logout']);
    Route::get('register', [Front\AccountController::class, 'register']);
    Route::post('register', [Front\AccountController::class, 'postRegister']);
});

//Admin
Route::prefix('admin')->group(function () {
    Route::redirect('', 'admin/user');
    Route::resource('user', \Admin\UserController::class)->middleware(\App\Http\Middleware\CheckAdminLogin::class);
    Route::resource('category', \Admin\ProductCategoryController::class)->middleware(\App\Http\Middleware\CheckAdminLogin::class);
    Route::resource('brand', \Admin\BrandController::class)->middleware(\App\Http\Middleware\CheckAdminLogin::class);
    Route::resource('product', \Admin\ProductController::class)->middleware(\App\Http\Middleware\CheckAdminLogin::class);
    Route::resource('product/{product_id}/image', \Admin\ProductImageController::class)->middleware(\App\Http\Middleware\CheckAdminLogin::class);
    Route::resource('product/{product_id}/variant', \Admin\ProductVariantController::class)->middleware(\App\Http\Middleware\CheckAdminLogin::class);
    Route::resource('order', \Admin\OrderController::class)->middleware(\App\Http\Middleware\CheckAdminLogin::class);
//    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::prefix('login')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\HomeController::class, 'getLogin']);
        Route::post('', [\App\Http\Controllers\Admin\HomeController::class, 'postLogin']);
    });
    Route::get('logout', [\App\Http\Controllers\Admin\HomeController::class, 'logout']);
});
