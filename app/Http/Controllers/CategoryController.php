<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category) {
        $products = \App\Product::all();

        return view('frontend/categories/show', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
