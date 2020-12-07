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
