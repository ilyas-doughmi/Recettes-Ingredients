<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = categories::all();
        return view('recipes.create', ['categories' => $categories]);
    }
}
