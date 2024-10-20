<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ingredients= Ingredient::all();
        return view('ingredient.index',['ingredients'=>$ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $ingredient = new Ingredient();
        $ingredient->name = $request->nombre;
        $ingredient->save();

        // Redirigir a la lista de categorías
        return redirect()->route('ingredients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $ingredient = Ingredient::find($id);
        return view('ingredient.edit', ['ingredient' => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ingredient = Ingredient::find($id);
        $ingredient->name = $request->nombre;
        $ingredient->save();

        // Redirigir a la lista de categorías
        return redirect()->route('ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $ingredient = Ingredient::find($id);
        $ingredient->delete();

        // Redirigir a la lista de categorías
        return redirect()->route('ingredient.index');
    }
}
