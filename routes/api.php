<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', 'ProductController@show');

Route::post('products/{id}', 'Cart@addToCart');

Route::get('/cart', 'Cart@show');
// Route::patch('update-cart', 'ProductsController@update');
// Route::delete('remove-from-cart', 'ProductsController@remove');
