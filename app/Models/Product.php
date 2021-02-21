<?php

namespace App\Models;

use App\Scopes\ProductScope;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'description', 'img', 'price', 'action_price', 'slug', 'recommended', 'category_id'];

    public function getImgAttribute($value)
    {
       return $value ? $value : '/images/no_image.jpg';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'id');
        // модель, название столбца с внешним ключом, название столба текущей модели, название столбца связанной модели
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
        // модель, название столбца с внешним ключом, название столба текущей модели, название столбца связанной модели
    }

    protected static function booted()
    {
        static::addGlobalScope(new ProductScope);
    }

    public function scopeRecommended($query)
    {
        $query->where('recommended', 1);
    }

    public function scopeLatest($query)
    {
        $query->orderByDesc('created_at');
    }

    public function recommendations()
    {
        return $this->belongsToMany(Self::class, 'recommendations', 'product_id', 'recommended_id');
    }
}
