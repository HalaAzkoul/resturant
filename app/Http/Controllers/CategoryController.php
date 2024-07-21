<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
      
        return view("admin.categories", compact('categories'));
    }

    public function showcategory()
    {
        $categories = Category::all();
      
        return view('main.listfood', compact('categories'));
    }



    public function create()
    {  
        return view('admin.create_category');
       
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create new category
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit_category', compact('category'));
    }




    public function update(Request $request, $id)
    {
         
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
     

        
        $category->save();

        return redirect()->route('category.index')->with('success', 'category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete(); 

        return redirect()->route('category.index')->with('success', 'category deleted successfully.');
    }
}
