<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = \App\Product::findOrFail($id);

        return view('frontend/products/show', [
            'product' => $product
        ]);
    }
}
