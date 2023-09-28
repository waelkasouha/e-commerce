<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_cart_id',
        'product_id',
        'quantity'

    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function shopping_cart()
    {
        return $this->belongsTo(ShoppingCart::class);
    }
}
