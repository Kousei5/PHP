<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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

Route::get('/shops',[ShopController::class,'index'])->name('shop.list');

Route::get('/shop/new',[ShopController::class,'create'])->name('shop.new');
Route::post('/shop',[ShopController::class,'store'])->name('shop.store');

Route::get('/shop/edit/{id}',[ShopController::class,'edit'])->name('shop.edit');
Route::post('/shop/update/{id}',[ShopController::class,'update'])->name('shop.update');

Route::get('/shop/{id}',[ShopController::class,'show'])->name('shop.detail');
Route::delete('/shop/{id}',[ShopController::class,'destroy'])->name('shop.destroy');

Route::get('/', function () {
    return redirect('/shops');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
