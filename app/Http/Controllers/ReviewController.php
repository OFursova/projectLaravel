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
        $reviews = Review::paginate(5);
        // вывести дату отзыва в фомате дд.мм.гггг
        //dump($products);
        //dd($reviews);
        return view('main.reviews', compact('title', 'products', 'reviews'));
    }

    public function sendReview(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'review' => 'required|min:3',
        ]);
    
        $review = new Review();
        $review->name = $request->name;
        $review->review = $request->review;
        $review->save();

        return back()->with('success', 'Thank you for your review!');
    }
}