<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);

        // find products from cart
        $ids = array_keys($cart);
        $products = \App\Product::find($ids)->toArray();

        // calculate total... 
        $total = 0;
        foreach ($products as $index => $product) {
            $total += $product['price'];

            // ... and set qty
            $productId = $product['id'];
            $products[$index]['qty'] = $cart[$productId];
        }

        return view('frontend/cart', [
            'products' => $products,
            'total' => $total
        ]);
    }

    public function addToCart(Request $request, bool $update = false)
    {
        $cart = session()->get('cart', []);
        $data = $request->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer'
        ]);
        $id = (int) $data['id'];
        $qty = (int) $data['qty'];

        // update or set qty
        if (!isset($cart[$id]) || $update) {
            $cart[$id] = $qty;
        } else {
            $cart[$id] += $qty;
        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }

    public function updateCart(Request $request)
    {
        return $this->addToCart($request, true);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        unset($cart[$request->input('id')]);
        session()->put('cart', $cart);

        return redirect('/cart');
    }
}
