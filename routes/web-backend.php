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


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('backend/home', [
            'productsCount' => App\Product::count(),
            'categoriesCount' => App\Category::count(),
        ]);
    });

    Route::resource('/products', 'ProductController');
    Route::resource('categories', 'CategoryController');

    Route::get('/orders',             function () {
        return view('backend/orders/index');
    });
    Route::get('/orders/show',        function () {
        return view('backend/orders/show');
    });
    Route::get('/users',              function () {
        return view('backend/users/index');
    });
    Route::get('/users/create',       function () {
        return view('backend/users/create');
    });
    Route::get('/users/edit',         function () {
        return view('backend/users/edit');
    });
});
