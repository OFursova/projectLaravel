<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    public function recommendations()
    {
        return $this->belongsToMany(Product::class, 'recommendations');
    }
}
