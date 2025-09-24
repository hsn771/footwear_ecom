<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\FrontendController as front;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductSizeStockController;
use  App\Http\Controllers\CouponController;
use  App\Http\Controllers\CartController;
use  App\Http\Controllers\CheckoutController;
use  App\Http\Controllers\Vendor\VendorController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

// Route::get('/man', function () {
//     return view('man');
// })->name('man');

Route::get('/',[front::class,'welcome'])->name ('welcome');
Route::get('man',[front::class,'man'])->name ('man');

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('cart',[CartController::class,'viewCart'])->name('cart.view');
Route::post('cart/add',[CartController::class,'addToCart'])->name('cart.add');
Route::post('cart/update',[CartController::class,'updateCart'])->name('cart.update');
Route::get('cart/remove/{id}',[CartController::class,'removeFromCart'])->name('cart.remove');
Route::post('cart/check_coupon',[CartController::class,'checkCoupon'])->name('cart.check_coupon');
Route::get('checkout',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('checkout/place_order',[CheckoutController::class,'placeOrder'])->name('checkout.place_order');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Auth::routes();
Route::middleware('auth:web')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product_size_stock', ProductSizeStockController::class);
    Route::resource('coupon', CouponController::class);

});


// all vendor 
Route::get('vendor/register',[VendorController::class,'register'])->name('vendor.register');