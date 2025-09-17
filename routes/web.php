<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/man', function () {
    return view('man');
})->name('man');

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Auth::routes();
Route::middleware('auth:web')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

});
