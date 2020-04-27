<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function shipping()
    {
        return view('frontend/checkout/shipping');
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
