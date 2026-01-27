<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    return redirect('/');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    return redirect('/');
});

// Recipe Routes
Route::get('/recipes', function () {
    return view('recipes.index');
});

Route::get('/recipes/create', function () {
    return view('recipes.create');
});

Route::post('/recipes', function () {
    return redirect('/recipes');
});

Route::get('/recipes/{id}', function ($id) {
    return view('recipes.show', ['id' => $id]);
});

// Profile Routes
Route::get('/profile', function () {
    return view('profile.show');
});
