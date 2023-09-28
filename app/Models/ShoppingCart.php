<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'quantity',
        'total_payment_price',
    ];



  public function products(): HasMany
  {
      return $this->hasMany(Product::class, 'id', 'product_id');
  }

  public function users(): HasMany
  {
      return $this->hasMany(Cart::class, 'id', 'user_id');
  }
}
