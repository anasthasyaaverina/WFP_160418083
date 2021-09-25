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

Route::get('/', function () {
    return view('welcome');
})->name('index');

// Route::get('/', function () {
//     return view('layouts.admin');
// })->name('index');

Route::resource('products', 'ProductController');
Route::resource('categories', 'CategoryController');
Route::resource('suppliers', 'SupplierController');

Route::prefix('suppliers')->name('suppliers.')->group(function () {
    Route::post('get-products', 'SupplierController@get_products')->name('get_products');
});

Route::prefix('laporan')->name('laporan.')->group(function () {
    Route::get('showcake/{id}', 'LaporanController@showcake')->name('showcake');
    Route::get('kategoriproduk', 'LaporanController@kategoriproduk')->name('kategoriproduk');
    Route::get('reratajumlahstok', 'LaporanController@reratajumlahstok')->name('reratajumlahstok');
});