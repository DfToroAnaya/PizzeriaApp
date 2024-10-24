<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raw_Material;

class Raw_MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raw_materials= Raw_Material::all();
        return view('raw_material.index',['raw_materials'=>$raw_materials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('raw_material.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $raw_material = new Raw_Material();
        $raw_material->id = $request->id;
        $raw_material->name = $request->name;
        $raw_material->unit = $request->unit;
        $raw_material->current_stock = $request->current_stock;
        $raw_material->save();

        return redirect()->route('raw_materials.index');
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
        $raw_material = Raw_Material::find($id);
        return view('raw_material.edit', ['raw_material' => $raw_material]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $raw_material = Raw_Material::find($id);
        
        $raw_material->name = $request->name;
        $raw_material->unit = $request->unit;
        $raw_material->current_stock = $request->current_stock;
        $raw_material->save();

        return redirect()->route('raw_materials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $raw_material = Raw_Material::find($id);
        $raw_material->delete();

        // Redirigir a la lista de categorías
        return redirect()->route('raw_materials.index');
    }
}
