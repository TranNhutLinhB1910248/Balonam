<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'total',
        'name',
        'phone',
        'address',
        'email'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'cart_id')
        ->withDefault(['name' => '']);
    }

    public function orders_detail()
    {
        return $this->hasMany(DetailCart::class, 'id', 'cart_id')
        ->withDefault(['name' => '']);
    }
}
