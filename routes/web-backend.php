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

Route::get('/admin', function () {
    return view('backend/home', [
        'productsCount' => App\Product::count(),
        'categoriesCount' => App\Category::count(),
    ]);
});
Route::resource('/admin/products', 'ProductController')->except(['show']);
Route::resource('/admin/categories', 'CategoryController')->except(['show']);
Route::get('/admin/orders',             function() { return view('backend/orders/index'); });
Route::get('/admin/orders/show',        function() { return view('backend/orders/show'); });
Route::get('/admin/users',              function() { return view('backend/users/index'); });
Route::get('/admin/users/create',       function() { return view('backend/users/create'); });
Route::get('/admin/users/edit',         function() { return view('backend/users/edit'); });
