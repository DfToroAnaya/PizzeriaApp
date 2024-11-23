<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Raw_Material;

class Raw_MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $raw_materials= Raw_Material::all();
        return json_encode(['raw_materials'=>$raw_materials]);
=======
        $raw_materials=DB::table('raw_materials')
        ->orderBy('name')
        ->get();
        return json_encode(['raw_materials' => $raw_materials]);
>>>>>>> 09a755009711a5960f6fb2f871b41a86caa06d9a
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $validate = Validator::make($request->all(), [
            'id' => ['required', 'numeric', 'min:1'],
            'name' => ['required', 'max:30', 'unique'],
            'unit' => ['required', 'max:30', 'unique'],
            'current_stock' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $raw_material = new Raw_Material();
        $raw_material->id = $request->id;
        $raw_material->name = $request->name;
        $raw_material->unit = $request->unit;
        $raw_material->current_stock = $request->current_stock;
        $raw_material->save();
        return response()->json(['raw_material' =>$raw_material]);
=======
        //
>>>>>>> 09a755009711a5960f6fb2f871b41a86caa06d9a
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
<<<<<<< HEAD
        $raw_material = Raw_Material::find($id);
        if (is_null($raw_material)){
            return abort(404);
        }
        return json_encode(['raw_material' => $raw_material]);
=======
        //
>>>>>>> 09a755009711a5960f6fb2f871b41a86caa06d9a
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
<<<<<<< HEAD
        $raw_material = Raw_Material::find($id);
        $raw_material->name = $request->name;
        $raw_material->unit = $request->unit;
        $raw_material->current_stock = $request->current_stock;
        $raw_material->save();
        return response()->json(['raw_materials' => $raw_material]);
=======
        //
>>>>>>> 09a755009711a5960f6fb2f871b41a86caa06d9a
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
<<<<<<< HEAD
        $raw_material = Raw_Material::find($id);
        $raw_material->delete();
        // Redirigir a la lista de categorías
        return response()->json(['raw_materials' => $raw_material, 'success' => true]);
=======
        //
>>>>>>> 09a755009711a5960f6fb2f871b41a86caa06d9a
    }
}
