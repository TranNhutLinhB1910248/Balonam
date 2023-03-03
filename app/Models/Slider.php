<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'menu_id',  
        'url',
        'thumb',
        'sort_by',
        'active'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
                ->withDefault(['name' => '']);
    }
}
