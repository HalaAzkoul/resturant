<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Food;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add items to the cart.');
        }

        $foodId = $request->input('food_id');
        $quantity = $request->input('quantity', 1);


        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);


        $existingCart = $cart->foods()->where('food_id', $foodId)->first();

        if ($existingCart) {

            $cart->foods()->updateExistingPivot($foodId, ['quantity' => $existingCart->pivot->quantity + $quantity]);
        } else {

            $cart->foods()->attach($foodId, ['quantity' => $quantity]);
        }

        return redirect()->back()->with('success', 'food added to cart!');
    }
    public function index()
{
    $carts = Cart::with('foods')->get();
    return view('cart.view', compact('carts'));
}

public function showCart()
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to view the cart.');
        }

        $carts = Cart::where('user_id', Auth::id())->with('foods')->get();

        return view('cart.view', compact('carts'));
    }


    public function update(Request $request, food $food)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);







        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->foods()->updateExistingPivot($food->id, ['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function removeFromCart(Food $food)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to remove items from the cart.');
        }

        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            $cart->foods()->detach($food->id);
        }

        $cart->save();

        return redirect()->route('cart.view')->with('success', 'food removed from cart!');
    }

/*
    public function removeFromCart($id)
    {
        $food = Food::findOrFail($id); // Find the food item
        $food->delete(); // Delete the food item

        return redirect()->route('cart.remove')->with('success', 'Food item deleted successfully.');
    }*/


}
