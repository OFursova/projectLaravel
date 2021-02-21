<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderItems()
    {
        return $this->belongsToMany(OrderItems::class, 'order_items');
    }

    public function status()
    {
        return $this->belongsToMany(Self::class, 'status', 'status_id', 'id');
    }
}
