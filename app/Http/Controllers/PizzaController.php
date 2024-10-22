<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pizzas= Pizza::all();
        return view('pizza.index',['pizzas'=>$pizzas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $pizza = new Pizza();
        $pizza->name = $request->nombre;
        $pizza->save();

        // Redirigir a la lista de categorías
        return redirect()->route('pizzas.index');
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
        $pizza = Pizza::find($id);
        return view('pizza.edit', ['pizza' => $pizza]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pizza = Pizza::find($id);
        $pizza->name = $request->nombre;
        $pizza->save();

        // Redirigir a la lista de categorías
        return redirect()->route('pizzas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pizza = Pizza::find($id);
        $pizza->delete();

        // Redirigir a la lista de categorías
        return redirect()->route('pizzas.index');
    }
}
