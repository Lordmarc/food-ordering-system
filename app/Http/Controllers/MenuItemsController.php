<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MenuItem;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categories = Category::all();
        $menuItems = MenuItem::with('category')->get();

        return view('admin.menuitem.index', compact('categories', 'menuItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.menuitem.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|exists:categories,id',
            'image'  => 'required|image|mimes:jpg,png,jpeg,gif,jfif|max:2048',
        ]);

        if ($request->hasFile('image'))
        {
            $path = $request->file('image')->store('menu-items', 'public');
            $validated['image'] = $path;
        }

        MenuItem::create($validated);

        return redirect()->route('admin.menuitem')->with('success', 'Menu Item Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
