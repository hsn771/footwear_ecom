<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\FrontendController as front;
use App\Http\Controllers\DashboardController as dash;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductSizeStockController;
use  App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use  App\Http\Controllers\CartController;
use  App\Http\Controllers\CheckoutController;
// vendor
use  App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorOrderController;
// customer
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Customer\CustomerOrderController;

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
Route::get('/shop/{id}', [front::class, 'shop'])->name('shop');
Route::get('productdescription/{id}',[front::class,'productdescription'])->name ('productdescription');

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
    Route::get('dashboard', [dash::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product_size_stock', ProductSizeStockController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('order', OrderController::class);

});


// all vendor
Route::get('vendor/register',[VendorController::class,'register'])->name('vendor.register');
Route::post('vendor/register',[VendorController::class,'store'])->name('vendor.store');
Route::get('vendor/login',[VendorController::class,'login'])->name('vendor.login');
Route::post('vendor/login',[VendorController::class,'checkLogin'])->name('vendor.login');
Route::get('vendor/logout',[VendorController::class,'logout'])->name('vendor.logout');
Route::middleware('auth:vendor')->group(function () {
    Route::get('vendor/dashboard',[DashboardController::class,'index'])->name('vendor.dashboard');
    Route::resource('vendor/product', VendorProductController::class, ['as'=>'vendor']);
    Route::resource('vendor/order', VendororderController::class, ['as'=>'vendor']);
});

  // Customer Authentication Routes
    Route::prefix('customer_panel')->group(function () {
        Route::get('login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
        Route::post('login', [CustomerAuthController::class, 'login'])->name('customer.login.submit');
        Route::get('register', [CustomerAuthController::class, 'showRegistrationForm'])->name('customer.register');
        Route::post('register', [CustomerAuthController::class, 'register'])->name('customer.register.submit');
        Route::post('logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

        // Protected customer routes
        Route::middleware('auth:customer')->group(function () {
            Route::get('dashboard', [CustomerDashboardController::class, 'index'])->name('customer_panel.dashboard');
            Route:: resource('order',CustomerOrderController::class, ['as' => 'customer_panel']);
            
        });
        });