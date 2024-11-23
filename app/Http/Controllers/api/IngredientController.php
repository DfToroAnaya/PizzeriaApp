<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients= Ingredient::all();
        return json_encode(['ingredients' => $ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->name = $request->nombre;
        $ingredient->save();
        return json_encode(['ingredient' => $ingredient]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ingredient = Ingredient::find($id);
        if(is_null($ingredient)){
            return abort(404);
        }
        return json_encode(['ingredient'=>$ingredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ingredient = Ingredient::find($id);
        if(is_null($ingredient)){
            return abort(404);
        }
        $ingredient->name = $request->nombre;
        $ingredient->save();

        return json_encode(['ingredient'=>$ingredient]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingredient = Ingredient::find($id);
        if(is_null($ingredient)){
            return abort(404);
        }
        $ingredient->delete();

        return json_encode(['ingredients' =>$ingredients, 'success'=>true]);
    }
}

