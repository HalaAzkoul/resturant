<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();

        return view("admin.food", compact('foods'));
    }

    public function create()
    {    $categories = Category::all();
        return view('admin.create_food', compact('categories'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Food::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
           'category_id' => $request->category_id,



        ]);

        return redirect()->route('food.index')->with('success', 'Food item added successfully.');
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_food', compact('food','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $food = Food::findOrFail($id);
        $food->title = $request->input('title');
        $food->price = $request->input('price');
        $food->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $food->image = $imageName;
        }

        $food->save();

        return redirect()->route('food.index')->with('success', 'Food item updated successfully.');
    }


    public function destroy($id)
    {
        $food = Food::findOrFail($id); // Find the food item
        $food->delete(); // Delete the food item

        return redirect()->route('food.index')->with('success', 'Food item deleted successfully.');
    }

}
