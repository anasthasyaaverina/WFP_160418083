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

Route::middleware('auth')->group(function () {
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('customers', 'CustomerController');
    Route::resource('transactions', 'TransactionController');

    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::post('get-detail-data', 'TransactionController@get_detail_data')->name('get_detail_data');
    });

    Route::prefix('products')->name('products.')->group(function () {
        Route::post('form-ajax', 'ProductController@form_ajax')->name('form.ajax');
        Route::post('save-ajax', 'ProductController@save_ajax')->name('save.ajax');
        Route::post('delete-ajax', 'ProductController@delete_ajax')->name('delete.ajax');
    });

    Route::prefix('suppliers')->name('suppliers.')->group(function () {
        Route::post('get-products', 'SupplierController@get_products')->name('get_products');
        Route::post('form-ajax', 'SupplierController@form_ajax')->name('form.ajax');
        Route::post('save-ajax', 'SupplierController@save_ajax')->name('save.ajax');
        Route::post('delete-ajax', 'SupplierController@delete_ajax')->name('delete.ajax');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::post('get-products', 'CategoryController@get_products')->name('get_products');
    });

    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('showcake/{id}', 'LaporanController@showcake')->name('showcake');
        Route::get('kategoriproduk', 'LaporanController@kategoriproduk')->name('kategoriproduk');
        Route::get('reratajumlahstok', 'LaporanController@reratajumlahstok')->name('reratajumlahstok');
        Route::get('produktransaksi', 'LaporanController@produktransaksi')->name('produktransaksi');
        Route::post('showproduktransaksi', 'LaporanController@showproduktransaksi')->name('showproduktransaksi');
    });
});

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');
