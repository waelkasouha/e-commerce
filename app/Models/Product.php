<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
}
