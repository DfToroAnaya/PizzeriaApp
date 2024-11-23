<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_materials_id', '=', 'raw_materials.id')
            ->select(
                'purchases.id as code',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_name',
                'purchases.quantity',
                'purchases.purchase_price',
                'purchases.created_at as purchase_date')
            ->get();

        return json_encode(['purchases' => $purchases]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'supplier_id' => ['required', 'max:30', 'unique'],
            'raw_materials_id' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'purchase_price' => ['required', 'numeric', 'min:1'],
            'created_at' => ['required', 'date']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $purchase = new Purchase();
        $purchase->supplier_id = $request->supplier_id;
        $purchase->raw_materials_id = $request->raw_materials_id;
        $purchase->quantity = $request->quantity;
        $purchase->purchase_price = $request->purchase_price;
        $purchase->created_at = $request->created_at;
        $purchase->save();

        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_materials_id', '=', 'raw_materials.id')
            ->select(
                'purchases.id as code',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_name',
                'purchases.quantity',
                'purchases.purchase_price',
                'purchases.created_at as purchase_date')
            ->get();

        return view ('purchase.index',  ['purchases' => $purchases]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchase = Purchase::find($id);
        if (is_null($purchase)){
            return abort(404);
        }

        $suppliers = DB::table('suppliers')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $raw_materials = DB::table('raw_materials')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return json_encode(['purchase' => $purchase, 'suppliers' => $suppliers, 'raw_materials' => $raw_materials]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'supplier_id' => ['required', 'max:30', 'unique'],
            'raw_materials_id' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'purchase_price' => ['required', 'numeric', 'min:1'],
            'created_at' => ['required', 'date']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }
        $purchase = Purchase::find($id);
        if (is_null($purchase)){
            return abort(404);
        }
        $purchase->supplier_id = $request->supplier;
        $purchase->raw_materials_id = $request->rawMaterial;
        $purchase->quantity = $request->quantity;
        $purchase->purchase_price = $request->purchasePrice;
        $purchase->created_at = $request->purchaseDate;
        $purchase->save();

        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_materials_id', '=', 'raw_materials.id')
            ->select(
                'purchases.id as code',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_name',
                'purchases.quantity',
                'purchases.purchase_price',
                'purchases.created_at as purchase_date')
            ->get();

        return json_encode(['purchases' => $purchases]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchase::find($id);
        if (is_null($purchase)){
            return abort(404);
        }
        $purchase->delete();
        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_materials_id', '=', 'raw_materials.id')
            ->select(
                'purchases.id as code',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_name',
                'purchases.quantity',
                'purchases.purchase_price',
                'purchases.created_at as purchase_date')
            ->get();

        return json_encode(['purchases' => $purchases]);
    }
}
