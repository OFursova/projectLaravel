<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
//use App\Models\Review;
//use App\Models\Category;
//use App\Models\User;
//use App\Models\Permission;

class MainController extends Controller
{
    public function index()
    {
        //dd(User::find(121)->hasRole('administrator')); // checking user role
        //dd(Permission::find(1)->roles);

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
        $slider = Slider::all();
        return view('main.index', compact('title', 'products', 'subtitle', 'slider'));
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
