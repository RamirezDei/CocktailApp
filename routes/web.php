<?php

use App\Http\Controllers\CocktailController;

Route::get('/', [CocktailController::class, 'index']);
Route::post('/save', [CocktailController::class, 'store']);
Route::get('/saved', [CocktailController::class, 'showSaved']);
Route::get('/cocktails/edit/{id}', [CocktailController::class, 'edit']); // Ruta para mostrar el formulario de edición
Route::post('/cocktails/update/{id}', [CocktailController::class, 'update']); // Ruta para actualizar el cóctel
Route::post('/delete/{id}', [CocktailController::class, 'destroy']);
