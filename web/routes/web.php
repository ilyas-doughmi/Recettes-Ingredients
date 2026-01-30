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

Route::get('/recipes',[RecetteController::class,'getAllRecettes']);

use App\Http\Controllers\CategorieController;
Route::get('/recipes/create', [CategorieController::class, 'index'])
->middleware('auth');

Route::post('/recipes',[RecetteController::class,'create'])
->middleware('auth');

Route::get('/recipes/{id}', [RecetteController::class,'getRecetteInfo']);


// Profile Routes
Route::get('/profile', function () {
    return view('profile.show');
})
->middleware('auth');
