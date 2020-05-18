<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Order;
use App\User;

class HomeController extends Controller
{
    public function show() {
        return view('backend/home', [
            'productsCount' => Product::count(),
            'categoriesCount' => Category::count(),
            'ordersCount' => Order::count(),
            'usersCount' => User::count(),
        ]);
    }
}
