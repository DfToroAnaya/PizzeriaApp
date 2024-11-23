<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extra_ingredient;
use Illuminate\Support\Facades\DB;

class Extra_IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extra_ingredients= Extra_ingredient::all();
        return json_encode(['extra_ingredients'=>$extra_ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $extra_ingredient = new Extra_ingredient();
        $extra_ingredient->name = $request->nombre;
        $extra_ingredient->price = $request->price;
        $extra_ingredient->save();

        return json_encode(['extra_ingredient'=>$extra_ingredient]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $extra_ingredient = Extra_ingredient::find($id);
        if(is_null($extra_ingredient)){
            return abort(404);
        }

        return json_encode(['extra_ingredient'=>$extra_ingredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $extra_ingredient = Extra_ingredient::find($id);
        if(is_null($extra_ingredient)){
            return abort(404);
        }
        $extra_ingredient->name = $request->nombre;
        $extra_ingredient->price = $request->price;
        $extra_ingredient->save();

        return json_encode(['extra_ingredient' => $extra_ingredient]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $extra_ingredient = Extra_ingredient::find($id);
        if(is_null($extra_ingredient)){
            return abort(404);
        }
        $extra_ingredient->delete();

        return json_encode(['extra_ingredients'=>$extra_ingredients, 'success'=> true]);
    }
}