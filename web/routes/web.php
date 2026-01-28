<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecetteController;
use Illuminate\Container\Attributes\Auth;

Route::get('/', function () {
    return view('home');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class,'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout',[AuthController::class,'logout']);


// Recipe Routes
Route::get('/recipes', function () {
    return view('recipes.index');
});

Route::get('/recipes/create', function () {
    return view('recipes.create');
});

Route::post('/recipes',[RecetteController::class,'create']);

Route::get('/recipes/{id}', function ($id) {
    return view('recipes.show', ['id' => $id]);
});

// Profile Routes
Route::get('/profile', function () {
    return view('profile.show');
});
