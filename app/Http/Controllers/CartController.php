<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        Cart::add(Product::findOrFail($request->product_id), $request->qty);
        return $request->product_id;
    }
}
