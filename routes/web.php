<?php

use App\Http\Controllers\CocktailController;

Route::group(['middleware' => 'auth'], function(){
Route::get('/', [CocktailController::class, 'index']);
Route::post('/save', [CocktailController::class, 'store']);
Route::get('/saved', [CocktailController::class, 'showSaved']);
Route::get('/cocktails/edit/{id}', [CocktailController::class, 'edit']);
Route::post('/cocktails/update/{id}', [CocktailController::class, 'update']);
Route::post('/delete/{id}', [CocktailController::class, 'destroy']);
});

Auth::routes();