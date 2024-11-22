<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branche;
use Illuminate\Support\Facades\DB;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches=Branche::all();
        return json_encode(['branches' => $branches]);

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

        return json_encode(['branche' => $branche]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branche=Branche::find($id);
        if(is_null($branche)){
            return abort(404);
        }
        return json_decode(['branche'=>$branche]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branche = Branche::find($id);
        if(is_null($branche)){
            return abort(404);
        }
        $branche->name = $request->name;
        $branche->address=$request->address;
        $branche->save();
        return json_encode(['branche' => $branche]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branche = Branche::find($id);
        if(is_null($branche)){
            return abort(404);
        }
        $branche->delete();
        return json_encode(['branches' => $branches, 'success'=> true]);
    }
}
