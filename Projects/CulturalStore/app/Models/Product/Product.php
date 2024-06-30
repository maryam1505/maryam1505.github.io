<?php

namespace App\Models\Product;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductName',
        'Description',
        'Price',
        'Stock',
        'CategoryID',
        'ProductStatus',
    ];
    protected $primaryKey = 'ProductID';
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'like_products', 'product_id', 'user_id')->withTimestamps();
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_product', 'pro_id', 'cart_id')
                    ->withPivot('qty', 'subtotal')
                    ->withTimestamps();
    }
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID', 'CategoryID');
    }
}