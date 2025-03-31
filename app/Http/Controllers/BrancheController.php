<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branche;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches=Branche::all();
        return view('branche.index',['branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branche.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $branche = new Branche();
        $branche->name = $request->name;
        $branche->address=$request->address;
        $branche->save();

        // Redirigir a la lista de categorías
       return redirect()->route('branches.index');
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
        $branches=Branche::find($id);
        return view('branche.edit', ['branche' => $branches]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branche = Branche::find($id);
        $branche->name = $request->name;
        $branche->address=$request->address;
        $branche->save();

        return redirect()->route('branches.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branche = Branche::find($id);
        $branche->delete();

        // Redirigir a la lista de categorías
        return redirect()->route('branches.index');
    }
}
