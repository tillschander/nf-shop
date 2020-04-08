<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('frontend/products/show', [
            'product' => $product
        ]);
    }
}
