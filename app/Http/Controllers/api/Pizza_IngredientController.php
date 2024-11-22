<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pizza_ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Pizza_IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizza_ingredients = DB::table('pizza_ingredients')
        ->join('pizzas', 'pizza_ingredients.pizza_id', '=', 'pizzas.id')          
        ->join('ingredients', 'pizza_ingredients.ingredient_id', '=', 'ingredients.id') 
        ->select(
            'pizza_ingredients.*',                 
            'pizzas.name as pizza_name',
            'ingredients.name as ingredient_name')
        ->get();
        return json_encode(['pizza_ingredients' => $pizza_ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza_ingredient = new Pizza_ingredient();

        $pizza_ingredient->pizza_id  = $request->pizza_id;
        $pizza_ingredient->ingredient_id  = $request->ingredient_id;
        $pizza_ingredient->save();

        return json_encode(['pizza_ingredient' =>$pizza_ingredient]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizza_ingredient = Pizza_ingredient::find($id);
        if(is_null($pizza_ingredient)){
            return abort(404);
        }

        $pizzas = DB::table('pizzas')
        ->select('id', 'name as pizza_name') 
        ->orderBy('name') 
        ->get();

        $ingredients = DB::table('ingredients')
        ->select('id', 'name as ingredient_name') 
        ->orderBy('name') 
        ->get();
        return json_encode(['pizza_ingredient' => $pizza_ingredient, 'pizzas'=>$pizzas,  'ingredients'=> $ingredients ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza_ingredient = Pizza_ingredient::find($id);
        if(is_null($pizza_ingredient)){
            return abort(404);
        }

        $pizza_ingredient->pizza_id  = $request->pizza_id;
        $pizza_ingredient->ingredient_id  = $request->ingredient_id;
        $pizza_ingredient->save();

        return json_encode(['pizza_ingredient' => $pizza_ingredient]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza_ingredient = Pizza_ingredient::find($id);
        if(is_null($pizza_ingredient)){
            return abort(404);
        }
        $pizza_ingredient ->delete();

        $pizza_ingredients = DB::table('pizza_ingredients')
        ->join('pizzas', 'pizza_ingredients.pizza_id', '=', 'pizzas.id')          
        ->join('ingredients', 'pizza_ingredients.ingredient_id', '=', 'ingredients.id') 
        ->select(
            'pizza_ingredients.*',                 
            'pizzas.name as pizza_name',
            'ingredients.name as ingredient_name')
        ->get();

        return json_encode(['pizza_ingredients' => $pizza_ingredients, 'success'=> true]);
    }
}
