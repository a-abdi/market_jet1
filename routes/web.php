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

Route::get('/', function () {
    return Inertia\Inertia::render('Home');
})->name('home');


Route::get('/goods/create', [App\Http\Controllers\GoodsController::class, 'create'])->name('goods.create');
Route::post('/goods', [App\Http\Controllers\GoodsController::class, 'store'])->name('goods.store');


