<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderShowController;
use App\Http\Controllers\OrdersShowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductShowController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth', 'cart'])->group(function () {
    Route::get('/cart', CartController::class)->name('cart');
});


Route::get('/checkout', CheckoutController::class)->name('checkout');
Route::get('/orders', OrdersShowController::class)->name('orders.show');
Route::get('/orders/{order:order_id}', OrderShowController::class)->name('order.show');
Route::get('/articles/{post:slug}', PostController::class)->name('post.show');
Route::get('/products/{product:slug}', ProductShowController::class)->name('products.show');
Route::get('/categories/{category:slug}', CategoryController::class)->name('category.show');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
