<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Page::create([
       'title' => $request->title,
        'content' => $request->content,]);

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.show', compact('page'));
    }

    public function edit( $id)
    {    $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);


         $page = Page::findOrFail($id);
         $page->title = $request->input('title');
         $page->content = $request->input('content');
         $page->save();

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();


        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }
}
