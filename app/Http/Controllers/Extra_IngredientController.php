<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extra_ingredient;

class Extra_IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $extra_ingredients= extra_ingredient::all();
        return view('extra_ingredient.index',['extra_ingredients'=>$extra_ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('extra_ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $extra_ingredient = new Extra_ingredient();
        $extra_ingredient->name = $request->nombre;
        $extra_ingredient->price = $request->price;
        $extra_ingredient->save();

        // Redirigir a la lista de categorías
        return redirect()->route('extra_ingredients.index');
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
        $extra_ingredient = Extra_ingredient::find($id);
        return view('extra_ingredient.edit', ['extra_ingredient' => $extra_ingredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $extra_ingredient = Extra_ingredient::find($id);
        $extra_ingredient->name = $request->nombre;
        $extra_ingredient->price = $request->price;
        $extra_ingredient->save();

        // Redirigir a la lista de categorías
        return redirect()->route('extra_ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $extra_ingredient = Extra_ingredient::find($id);
        $extra_ingredient->delete();

        // Redirigir a la lista de categorías
        return redirect()->route('extra_ingredients.index');
    }
}
