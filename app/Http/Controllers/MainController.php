<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
//use App\Models\Review;
//use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Welcome';
        $subtitle = '<em>to store</em>';
        //$categories = Category::all();
        //$products = Product::with('category')->withCount('reviews')->get();
        $products = Product::with('category')->get();
        //$products = Product::with('category')->recommended()->latest()->get();
        // local scope usage ^

        //dd($products[0]);
        //dump($products);
        //dd($categories);
        return view('main.index', compact('title', 'products', 'subtitle'));
    }

    public function contacts()
    {
        return view('main.contacts');
    }

    public function getContacts(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required|min:3',
        ]);

        //dd($request->all());
        //sending a letter
        //return redirect('/contacts')->with('success', 'Thanks!');
        return back()->with('success', 'Thanks!');
        //return view('main.contacts');
    }
}
