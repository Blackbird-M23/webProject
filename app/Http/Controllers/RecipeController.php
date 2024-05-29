<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $imagePath = $request->file('image')->store('images', 'public');
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('recipes_pic'), $imageName);

        Recipe::create([
            'user_name' => auth()->user()->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }
}
