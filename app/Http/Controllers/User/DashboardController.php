<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
//        $data = request()->session()->all();
//        request()->session()->forget('subscribe_not_show');
        $products = Product::latest()->take(20)->get();
//        $productsLast = Product::latest()->take(3)->get();

        return view('users.dashboard', compact('products'));
    }
}
