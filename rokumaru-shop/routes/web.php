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

Route::get('/shops', [ShopController::class, 'index'])->name('shop.list');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.detail');


Route::get('/', function () {
    return redirect('/shops');
});

