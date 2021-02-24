<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('store.checkout');
    }

    public function checkoutSave(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'phone' => 'required',
        //     'address' => 'required',
        // ]);

        $orderItems = Session::get('cart');
        $totalSum = Session::get('totalSum');
        
        $order = Order::create([
            'totalSum' => $totalSum,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status_id' => '1',
            ]);
        

        foreach ($orderItems as $item) {
            $items = OrderItems::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'product_price' => $item['price'],
                'product_qty' => $item['qty'],
                'product_img' => $item['img'],
            ]);
        }
        
        return view('main.index');
    }
}
