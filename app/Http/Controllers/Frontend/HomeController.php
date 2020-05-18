<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller
{
    public function show() {
        return view('frontend/home', [
            'products' => Product::take(4)->get()
        ]);
    }
}
