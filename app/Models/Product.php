<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_image',
        'name',
        'slug_name',
        'description',
        'price',
        'quantity',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function shopping_cart(): BelongsTo
     {
         return $this->belongsTo(ShoppingCart::class, 'product_id', 'id');
     }
}
