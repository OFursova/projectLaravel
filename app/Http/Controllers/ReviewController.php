<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends Controller
{
    public function review()
    {
        $title = 'Reviews';
        $products = Product::all();
        $reviews = Review::all();
        //dump($products);
        //dd($categories);
        return view('main.reviews', compact('title', 'products', 'reviews'));
    }

    public function sendReview(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'review' => 'required|min:3',
        ]);

        return back()->with('success', 'Thank you for your review!');
    }
}