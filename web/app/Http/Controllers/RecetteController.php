<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class RecetteController extends Controller
{
    public function index()
    {
        $user =Auth::user();

        $myRecipes = $user->recipes()->get();
        return view('profile.show', ['recettes' => $myRecipes]);
    }   

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'steps' => 'required|array',
            'steps.*' => 'required|string',
            'ingredients' => 'required|array',
            'ingredients.*' => 'required|string',
            'difficulty' => 'required',
            'category' => 'required',
        ]);

        $imagepath = $request->file('image')->store('recipes','public');

        Recipe::create([
            'title' => $request->title,
            'categorie_id' => $request->category,
            'difficulte' => $request->difficulty,
            'description' => $request->description,
            'image' => $imagepath,
            'user_id' => Auth::id(),
            'steps' => json_encode($request->steps),
            'ingredients' => json_encode($request->ingredients)
        ]);

        return redirect()->route('recipes.index?message=success');
    }
}
