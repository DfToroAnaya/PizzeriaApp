<?php

namespace App\Http\Controllers;

use App\Models\Pizza_raw_material;
use Illuminate\Http\Request;
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

        return view('pizza_raw_material.index', ['pizza_raw_materials' => $pizza_raw_materials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = DB::table('pizzas')
        ->select('id', 'name as pizza_name') 
        ->orderBy('name') 
        ->get();

        $raw_materials = DB::table('raw_materials')
        ->select('id', 'name as raw_materialst_name') 
        ->orderBy('name') 
        ->get();

        return view('pizza_raw_material.new', ['pizzas' => $pizzas, 'raw_materials' => $raw_materials]);
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

        $pizza_raw_materials  = DB::table('pizza_raw_materials')
        ->join('pizzas', 'pizza_raw_materials.pizza_id', '=', 'pizzas.id')          
        ->join('raw_materials', 'pizza_raw_materials.raw_material_id', '=', 'raw_materials.id') 
        ->select(
            'pizza_raw_materials.*',                 
            'pizzas.name as pizza_name',
            'raw_materials.name as raw_materialst_name')
        ->get();


        return view('pizza_raw_material.index', ['pizza_raw_materials' => $pizza_raw_materials]);
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
        $pizza_raw_material = Pizza_raw_material::find($id);
        
        $pizzas = DB::table('pizzas')
        ->select('id', 'name as pizza_name') 
        ->orderBy('name') 
        ->get();

        $raw_materials = DB::table('raw_materials')
        ->select('id', 'name as raw_materialst_name') 
        ->orderBy('name') 
        ->get();

        return view('pizza_raw_material.edit', ['pizza_raw_material' => $pizza_raw_material, 'pizzas'=>$pizzas,  'raw_materials'=> $raw_materials ]);
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

        $pizza_raw_materials  = DB::table('pizza_raw_materials')
        ->join('pizzas', 'pizza_raw_materials.pizza_id', '=', 'pizzas.id')          
        ->join('raw_materials', 'pizza_raw_materials.raw_material_id', '=', 'raw_materials.id') 
        ->select(
            'pizza_raw_materials.*',                 
            'pizzas.name as pizza_name',
            'raw_materials.name as raw_materialst_name')
        ->get();

        return redirect()->route('pizza_raw_materials.index');
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


        return view('pizza_raw_material.index', ['pizza_raw_materials' => $pizza_raw_materials]);
    }
}
