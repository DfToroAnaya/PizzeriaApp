<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza_size;
use Illuminate\Support\Facades\DB;

class Pizza_SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizza_sizes= DB::table('pizza_sizes')
        ->join('pizzas', 'pizza_sizes.pizzas_id', '=', 'pizzas.id')
        ->select('pizza_sizes.*', 'pizzas.name')
        ->get();

        return view('pizza_size.index', ['pizza_sizes' => $pizza_sizes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = DB::table('pizzas')
        ->orderBy('name')
        ->get();

        return view('pizza_size.new', ['pizzas' => $pizzas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza_size = new Pizza_size();
        $pizza_size->id = $request->id;
        $pizza_size->pizzas_id = $request->pizzas_id;
        $pizza_size->size = $request->size;
        $pizza_size->price =$request->price;

        $pizza_size->save();

        $pizza_sizes= DB::table('pizza_sizes')
        ->join('pizzas', 'pizza_sizes.pizzas_id', '=', 'pizzas.id')
        ->select('pizza_sizes.*', 'pizzas.name')
        ->get();

        return view('pizza_size.index', ['pizza_sizes' => $pizza_sizes]);
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
        $pizza_size = Pizza_size::find($id);

        $pizzas = DB::table('pizzas')
        ->orderBy('name')
        ->get();

        return view('pizza_size.edit', ['pizza_size' => $pizza_size, 'pizzas' => $pizzas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza_size =  Pizza_size::find($id);

        //$pizza_size->id = $request->id;
        $pizza_size->pizzas_id = $request->pizzas_id;
        $pizza_size->size = $request->size;
        $pizza_size->price =$request->price;
        $pizza_size->save();

        $pizza_sizes= DB::table('pizza_sizes')
        ->join('pizzas', 'pizza_sizes.pizzas_id', '=', 'pizzas.id')
        ->select('pizza_sizes.*', 'pizzas.name')
        ->get();

        return view('pizza_size.index', ['pizza_sizes' => $pizza_sizes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza_size = Pizza_size::find($id);
        $pizza_size->delete();

        $pizza_sizes= DB::table('pizza_sizes')
        ->join('pizzas', 'pizza_sizes.pizzas_id', '=', 'pizzas.id')
        ->select('pizza_sizes.*', 'pizzas.name')
        ->get();

        return view('pizza_size.index', ['pizza_sizes' => $pizza_sizes]);
    }
}
