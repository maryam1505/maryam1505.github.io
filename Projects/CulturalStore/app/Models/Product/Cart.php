<?php

namespace App\Models\Product;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
   

    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_product', 'cart_id', 'pro_id')
                    ->withPivot('qty', 'subtotal')
                    ->withTimestamps();
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
