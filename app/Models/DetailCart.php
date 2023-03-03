<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'cart_id',
        'product_id',
        'price',
        'price_sale',
        'qty'
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'id', 'cart_id')
        ->withDefault(['name' => '']);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')
        ->withDefault(['name' => '']);
    }

}
