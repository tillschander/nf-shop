<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id) {
        $category = \App\Category::findOrFail($id);
        $products = \App\Product::all();

        return view('frontend/categories/show', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
