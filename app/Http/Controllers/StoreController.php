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
        //$products = Product::all();
        //$products = Product::where('recommended', '=', 1)->where('price', '<', 500)->orderBy('name')->limit(5)->get();
        //$products = Product::where('recommended', '=', 1)->first();
        $products = Product::where('recommended', '=', 1)->paginate(3);
        //$products = Product::where('recommended', '=', 1)->simplePaginate(3);

        //dd($products);
        $categories = Category::all();
        //dump($products);
        //dd($categories);
        return view('store.sale', compact('title', 'products', 'categories'));
    }

    public function buyProduct(Request $request)
    {
        //Feature in development
        return back()->with('success', 'The item is in cart! Thanks!');
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);

        return view('store.category', compact('category', 'products'));
    }
}