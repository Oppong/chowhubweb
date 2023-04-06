<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        'status',
        'discount_percentage',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
