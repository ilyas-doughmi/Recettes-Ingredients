<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\User;
use App\Models\categories;

class RecetteController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $myRecipes = $user->recipes()->latest()->get();
        $myFavorites = $user->favorites()->latest()->get();
        $myComments = $user->comments()->with('recipe')->latest()->get();

        return view('profile.show', [
            'recettes' => $myRecipes,
            'favorites' => $myFavorites,
            'comments' => $myComments
        ]);
    }

    public function toggleLike($id)
    {
        $user = Auth::user();
        $recipe = Recipe::findOrFail($id);

        $like = \App\Models\Like::where('userId', $user->id)
                                ->where('recetteid', $recipe->id)
                                ->first();

        if ($like) {
            $like->delete();
            $message = 'Recette retirée des favoris';
        } else {
            \App\Models\Like::create([
                'userId' => $user->id,
                'recetteid' => $recipe->id
            ]);
            $message = 'Recette ajoutée aux favoris';
        }

        return back();
    }   

    public function getAllRecettes(Request $request)
    {
        $recipes = Recipe::query()
        ->when($request->categorie, function($query,$category){
            $query->whereRelation('categorie','name',$category);
        })
        ->get();
        
        $categories = categories::all();
        return view('recipes.index',['recettes' => $recipes,'categories'=> $categories]);
    }

    public function getRecetteInfo($id)
    {
        $recipe = Recipe::findOrFail($id);
        $category = categories::findOrFail($recipe->categorie_id);
        $user = User::findOrfail($recipe->user_id);
        return view('recipes.show' , ['recipe' =>$recipe,'user'=>$user,'category' => $category]);
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

        return redirect('/recipes');
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $recipe = Recipe::findOrFail($id);

         \App\Models\Comment::create([
            'userId' => Auth::id(),
            'recetteid' => $recipe->id,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
