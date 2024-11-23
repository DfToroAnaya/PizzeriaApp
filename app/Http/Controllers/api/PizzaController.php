<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas= Pizza::all();
        return json_encode(['pizzas' => $pizzas]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza = new Pizza();
        $pizza->name = $request->nombre;
        $pizza->save();

        return json_encode(['pizza'=>$pizza]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizza = Pizza::find($id);
        if(is_null($pizza)){
            return abort(404);
        }
        
        return json_encode(['pizza' => $pizza]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza = Pizza::find($id);
        if(is_null($pizza)){
            return abort(404);
        }
        $pizza->name = $request->nombre;
        $pizza->save();
        return json_encode(['pizza'=> $pizza]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza = Pizza::find($id);
        if(is_null($pizza)){
            return abort(404);
        }
        $pizza->delete();

        return json_encode(['pizzas'=>$pizzas, 'success' => true]);

    }
}
