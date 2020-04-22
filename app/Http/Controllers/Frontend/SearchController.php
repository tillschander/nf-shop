<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('frontend/search', [
            'query' => request()->input('q')
        ]);
    }
}
