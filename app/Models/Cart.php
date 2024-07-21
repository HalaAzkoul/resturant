<?php

namespace App\Models;

use App\Models\CartFood;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    protected $fillable = ['user_id'];

    public function foods()
    {
        return $this->belongsToMany(Food::class)->using(CartFood::class)->withPivot('quantity')->withTimestamps();
    }
}
