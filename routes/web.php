<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth:sanctum', 'verified'])->get('/goods/create', [App\Http\Controllers\GoodsController::class, 'create'])->name('goods.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/goods', [App\Http\Controllers\GoodsController::class, 'store'])->name('goods.store');
Route::get('/goods/{good}', [App\Http\Controllers\GoodsController::class, 'show'])->name('goods.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.sore');

Route::middleware(['auth:sanctum', 'verified'])->get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/cart/next', [App\Http\Controllers\CartController::class, 'next'])->name('cart.next');
Route::middleware(['auth:sanctum', 'verified'])->get('/cart/previous', [App\Http\Controllers\CartController::class, 'previous'])->name('cart.previous');
Route::middleware(['auth:sanctum', 'verified'])->post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::middleware(['auth:sanctum', 'verified'])->patch('/cart/order', [App\Http\Controllers\CartController::class, 'order'])->name('cart.order');
Route::middleware(['auth:sanctum', 'verified'])->patch('/cart/change', [App\Http\Controllers\CartController::class, 'change'])->name('cart.change');
Route::middleware(['auth:sanctum', 'verified'])->delete('/cart/{good}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');


Route::prefix('/admin')->name('admin.')->group(function() {
    Route::middleware(['auth:admin'])->get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    //Login Routes
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    //Forgot Password Routes
    Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'reset'])->name('password.update');

    Route::resource('goods', App\Http\Controllers\Admin\GoodsController::class)->middleware('auth:admin');
  });