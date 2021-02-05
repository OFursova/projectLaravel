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
        $reviews = Review::paginate(5);
        // вывести дату отзыва в фомате дд.мм.гггг
        //dump($products);
        //dd($reviews);
        return view('main.reviews', compact('title', 'reviews'));
    }

    public function sendReview(Request $request)
    {
        $productsCount = Product::latest()->first()->id;
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'review' => 'required|min:3',
            'product_id' => 'max:'.$productsCount,
        ]);
    
        $review = new Review();
        $review->name = $request->name;
        $review->review = $request->review;
        $review->product_id = $request->product_id;
        $review->save();

        return back()->with('success', 'Thank you for your review!');
    }
}