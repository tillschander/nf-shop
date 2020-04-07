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

$products = [
    'id1' => 'product1',
    'id2' => 'zweiter produktname'
];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () use ($products) {
    return view('products', ['products' => $products]);
});

Route::get('/products/{id}', function ($id) use ($products) {
    if (array_key_exists($id, $products)) {
        return $products[$id];
    }

    abort(404, 'Product not found');
});
