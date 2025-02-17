<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

use App\Http\Controllers\CocktailController;

Route::get('/', [CocktailController::class, 'index']);
Route::post('/save', [CocktailController::class, 'store']);
Route::get('/saved', [CocktailController::class, 'showSaved']);
Route::post('/delete/{id}', [CocktailController::class, 'destroy']);

