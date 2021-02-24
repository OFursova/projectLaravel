<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        
        // foreach ($orders as $order) {
        //     $item = OrderItems::where('order_id', $order->id);
        // }
        
        return view('admin.orders.index', compact('orders'));
    }
    
}
