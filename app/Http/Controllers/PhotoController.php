<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $imageName);

        Photo::create(['path' => 'uploads/' . $imageName]);

        return redirect()->route('photos.index')
                        ->with('success','Photo uploaded successfully.');
    }




    public function edit( $id)
    {    $photo = Photo::findOrFail($id);
        return view('admin.photos.edit', compact('photo'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $photo = Photo::findOrFail($id); // Find the photo by id

    if ($request->hasFile('photo')) {
        // Delete the old photo
        File::delete(public_path($photo->path));

        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $imageName);

        // Update photo path in the database
        $photo->update(['path' => 'uploads/' . $imageName]);
    }

    return redirect()->route('photos.index')
                    ->with('success', 'Photo updated successfully.');
}


    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return redirect()->route('photos.index')
                        ->with('success','Photo deleted successfully');
    }




}
