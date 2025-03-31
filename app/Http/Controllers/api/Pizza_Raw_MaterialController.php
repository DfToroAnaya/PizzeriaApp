<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza_raw_material;
use Illuminate\Support\Facades\DB;

class Pizza_Raw_MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizza_raw_materials  = DB::table('pizza_raw_materials')
        ->join('pizzas', 'pizza_raw_materials.pizza_id', '=', 'pizzas.id')          
        ->join('raw_materials', 'pizza_raw_materials.raw_material_id', '=', 'raw_materials.id') 
        ->select(
            'pizza_raw_materials.*',                 
            'pizzas.name as pizza_name',
            'raw_materials.name as raw_materialst_name')
        ->get();

        return json_encode(['pizza_raw_materials'=>$pizza_raw_materials]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza_raw_material = new Pizza_raw_material();

        $pizza_raw_material->pizza_id  = $request->pizza_id;
        $pizza_raw_material->raw_material_id  = $request->raw_material_id;
        $pizza_raw_material->quantity = $request->quantity;
        $pizza_raw_material->save();
        return json_encode(['pizza_raw_material'=>$pizza_raw_material]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizza_raw_material = Pizza_raw_material::find($id);

        $pizzas = DB::table('pizzas')
        ->select('id', 'name as pizza_name') 
        ->orderBy('name') 
        ->get();

        $raw_materials = DB::table('raw_materials')
        ->select('id', 'name as raw_materialst_name') 
        ->orderBy('name') 
        ->get();

        return json_encode(['pizza_raw_material' => $pizza_raw_material, 'pizzas'=>$pizzas,  'raw_materials'=> $raw_materials ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza_raw_material = Pizza_raw_material::find($id);

        $pizza_raw_material->pizza_id  = $request->pizza_id;
        $pizza_raw_material->raw_material_id  = $request->raw_material_id;
        $pizza_raw_material->quantity = $request->quantity;
        $pizza_raw_material->save();

        return json_encode(['pizza_raw_material' => $pizza_raw_material]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza_raw_material = Pizza_raw_material::find($id);
        $pizza_raw_material ->delete();

        $pizza_raw_materials  = DB::table('pizza_raw_materials')
        ->join('pizzas', 'pizza_raw_materials.pizza_id', '=', 'pizzas.id')          
        ->join('raw_materials', 'pizza_raw_materials.raw_material_id', '=', 'raw_materials.id') 
        ->select(
            'pizza_raw_materials.*',                 
            'pizzas.name as pizza_name',
            'raw_materials.name as raw_materialst_name')
        ->get();

        return json_encode(['pizza_raw_materials' => $pizza_raw_materials, 'success'=> true]);

    }
}
