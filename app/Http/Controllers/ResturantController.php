<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
   public function index(){
    $foods = Food::all();
    return view("resturant", compact('foods'));
   }


}
