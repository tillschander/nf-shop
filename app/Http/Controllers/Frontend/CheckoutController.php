<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Product;

class CheckoutController extends Controller
{
    public function shipping()
    {
        // schicke Nutzer ohne Warenkorb zurück
        if (!session('cart')) return redirect('/cart');

        // prüfe ob der Nutzer schon eine Bestellung in der Session hat
        if (session('order')) {
            $orderId = session('order');
            $order = Order::find($orderId);
        } else {
            $order = Order::create();
        }

        // füge den Inhalt des Warenkorbs der Bestellung hinzu
        $cart = session('cart');
        $ids = array_keys($cart);
        $products = Product::find($ids)->toArray();
        foreach ($products as $index => $product) {
            $products[$index]['qty'] = $cart[$product['id']];
        }
        $order->addItems($products);

        // speichere die Bestellung in der session
        session()->put('order', $order->id);

        // rendere den shipping-view
        return view('frontend/checkout/shipping', [
            'order' => $order
        ]);
    }

    public function payment()
    {
        return view('frontend/checkout/payment');
    }

    public function success()
    {
        return view('frontend/checkout/success');
    }

    public function fail()
    {
        return view('frontend/checkout/fail');
    }

    public function setShippingAddress()
    {
    }
}
