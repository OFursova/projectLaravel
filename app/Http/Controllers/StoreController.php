<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class StoreController extends Controller
{
    public function sale()
    {
        $title = 'Mega Sale';
        $products = Product::all();
        $categories = Category::all();
        //dump($products);
        //dd($categories);
        return view('main.sale', compact('title', 'products', 'categories'));
    }

    public function buyProduct(Request $request)
    {
        //Feature in development
        return back()->with('success', 'The item is in cart! Thanks!');
    }
}