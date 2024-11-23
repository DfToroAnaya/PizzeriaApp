<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers= Supplier::all();
        return json_encode(['suppliers'=>$suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => ['required', 'numeric', 'min:1'],
            'name' => ['required', 'max:30', 'unique'],
            'contact_info' => ['required', 'max:30', 'unique']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $supplier = new Supplier();
        $supplier->id = $request->id;
        $supplier->name = $request->name;
        $supplier->contact_info = $request->contact_info;
        $supplier->save();
        return response()->json(['supplier' => $supplier]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);
        if (is_null($supplier)){
            return abort(404);
        }
        return json_encode(['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::find($id);
        //$supplier->id = $request->id;
        $supplier->name = $request->name;
        $supplier->contact_info = $request->contact_info;
        $supplier->save();
        return response()->json(['suppliers' => $supplier]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        // Redirigir a la lista de categorías
        return response()->json(['supplier' => $supplier, 'success' => true]);
    }
}
