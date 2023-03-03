<?php

use App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CartController1;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController1;
use App\Http\Controllers\MenuController1;
use App\Http\Controllers\ProductController1;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\AuthController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get ('admin/users/login', [LoginController::class, 'index'])->name(name: 'login');
Route::post ('admin/users/login/store', [LoginController::class, 'store']);
Route::get ('admin/users/register', [LoginController::class, 'index1'])->name(name: 'register');
Route::post ('admin/users/register/store', [LoginController::class, 'store1']);
Route::get('logout',[LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name(name: 'admin');
        Route::get('main', [MainController::class, 'index']);

        #Admin
        Route::prefix('users')->group(function () {
            Route::get('add', [MainController::class, 'create']);
            Route::post('add', [MainController::class, 'store']);
            Route::get('list', [MainController::class, 'list']);
            Route::DELETE('destroy', [MainController::class, 'destroy']);
         });
        
            #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
            Route::get('search', [MenuController::class, 'search']);
         });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);
        #Cart
        // Route::get('customers', [CartController1::class, 'index']);
        // Route::get('users/view/{user}', [CartController1::class, 'show']);  

         // Order
        Route::get('order_all',[CartController1::class, 'index_all']);
        Route::get('order_pending',[CartController1::class, 'index_pending']);
        Route::get('order_delivering',[CartController1::class, 'index_delivering']);
        Route::get('order_complete',[CartController1::class, 'index_complete']);
        Route::get('order_cancelled',[CartController1::class, 'index_cancelled']);
        Route::get('order/{id}', [CartController1::class, 'detail_order']);
        Route::post('order/{id}', [CartController1::class, 'update_order']);
        Route::get('search', [CartController1::class, 'search']);


    });
});

Route::get('/', [MainController1::class, 'index'])->name(name: 'user');
Route::post('/services/load-product', [MainController1::class, 'loadProduct']);

Route::get('contact',[MainController1::class, 'contact']);
Route::get('about',[MainController1::class, 'about']);
Route::post('search', [MainController1::class, 'search']);

Route::get('danh-muc/{id}-{slug}.html', [MenuController1::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [ProductController1::class, 'index']);

Route::post('add-cart',[CartController::class, 'index']);
Route::get('carts',[CartController::class, 'show']);
Route::post('update-cart',[CartController::class, 'update']);
Route::get('carts/delete/{id}',[CartController::class, 'remove']);
Route::get('checkout',[CartController::class, 'showcheckout']);
Route::post('/carts/checkout',[CartController::class, 'getCart']);

Route::get('/purchase_order/{id}',[CartController::class, 'show_DonHang']);
Route::get('/purchase_order/orderdetail/{id}',[CartController::class, 'show_ChitietDonhang']);
Route::post('/purchase_order/orderdetail/{id}',[CartController::class, 'update_DonHang']);


Route::get('/auth/social-auth', [AuthController::class, 'index'])->name('social-auth'); 
Route::get('/auth/google/redirect', [AuthController::class, 'googleRedirect'])->name('googleRedirect');
Route::get('/auth/google/callback', [AuthController::class, 'googleCallback'])->name('googleCallback');
