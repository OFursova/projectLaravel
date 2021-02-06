<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'img', 'slug'];

    public function products()
    {
      return $this->hasMany(Product::class);
    }

    public function getImgAttribute($value)
    {
       return $value ? $value : '/images/no_image.jpg';
    }
}
