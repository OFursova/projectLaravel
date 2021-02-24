<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['totalSum', 'name', 'phone', 'address', 'status_id'];

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id', 'id', 'id');
    }
}
