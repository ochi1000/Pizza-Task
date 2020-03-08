<?php

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

Route::get('/admin','Admin\DashboardController@show','dashboard');

Route::get('/admin/products','Admin\ProductController@show','product');
Route::post('/admin/products/create','Admin\ProductController@create','create_product');

Route::get('/', 'CartController@showProducts')->name('products');

Route::get('/cart', 'CartController@show');
Route::post('/add-to-cart', 'CartController@addToCart');
Route::post('update-cart', 'CartController@update');

Route::post('/order', 'OrderController@makeOrder');
Route::get('/complete', 'OrderController@completedOrder');
