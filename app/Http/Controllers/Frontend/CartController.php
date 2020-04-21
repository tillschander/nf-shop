<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        return view('frontend/cart');
    }

    public function addToCart(Request $request)
    {
        dd($request->all());
    }

    public function updateCart()
    {

    }

    public function removeFromCart()
    {

    }
}
