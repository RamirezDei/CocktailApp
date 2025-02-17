<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cocktail;
use Illuminate\Support\Facades\Http;

class CocktailController extends Controller
{
    public function index()
    {
        $response = Http::get('https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=Cocktail');
        $cocktails = $response->json()['drinks'];
        return view('cocktails.index', compact('cocktails'));
    }

    public function store(Request $request)
    {
        $cocktail = new Cocktail();
        $cocktail->name = $request->input('name');
        $cocktail->image = $request->input('image');
        $cocktail->category = $request->input('category');
        $cocktail->save();

        return redirect('/')->with('success', 'Cóctel guardado exitosamente');
    }

    public function showSaved()
    {
        $cocktails = Cocktail::all();
        return view('cocktails.saved', compact('cocktails'));
    }

    public function destroy($id)
    {
        Cocktail::destroy($id);
        return redirect('/saved')->with('success', 'Cóctel eliminado');
    }
}
