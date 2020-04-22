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
    return view('frontend/home', [
        'products' => App\Product::take(4)->get()
    ]);
});
Route::get('/categories/{category}',    'CategoryController@show');
Route::get('/products/{product}',       'ProductController@show');

Route::get('/cart',                     'CartController@show');
Route::post('/cart/add',                'CartController@addToCart');
Route::patch('/cart/update',            'CartController@updateCart');
Route::delete('/cart/remove',           'CartController@removeFromCart');

Route::get('/search',                   'SearchController@index')->name('search');

Route::get('/checkout/shipping',        function() { return view('frontend/checkout/shipping'); });
Route::get('/checkout/payment',         function() { return view('frontend/checkout/payment'); });
