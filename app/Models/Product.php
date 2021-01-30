<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getImgAttribute($value)
    {
       return $value ? $value : '/images/no_image.jpg';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'id');
        // модель, название столбца с внешним ключом, название столба текущей модели, название столбца связанной модели
    }
}
