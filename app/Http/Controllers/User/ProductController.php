<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
//dd(Cart::content());
        return view('users.components.products.show', compact('product'));
    }
    public function cart()
    {
        return view('users.components.products.cart');
    }
}
