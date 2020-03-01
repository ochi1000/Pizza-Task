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

Route::get('/cart', 'Cart@show');
Route::patch('update-cart', 'Cart@update');
Route::delete('remove-from-cart', 'Cart@remove');

Route::post('/order', 'Cart@order');

Route::view('/{path?}', 'layouts.app');
