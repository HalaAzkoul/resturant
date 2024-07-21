<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\CartFood;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'description', 'image', 'category_id'];

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->using(CartFood::class)->withPivot('quantity')->withTimestamps();
    }



}
