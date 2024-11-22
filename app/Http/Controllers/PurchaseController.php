<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view ('purchase.index',  ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = DB::table('suppliers')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $raw_materials = DB::table('raw_materials')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return view('purchase.create', ['suppliers' => $suppliers, 'raw_materials' => $raw_materials]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purchase = new Purchase();

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

        return view ('purchase.index',  ['purchases' => $purchases]);
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
        $purchase = Purchase::find($id);

        $suppliers = DB::table('suppliers')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $raw_materials = DB::table('raw_materials')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return view('purchase.edit', ['purchase' => $purchase, 'suppliers' => $suppliers, 'raw_materials' => $raw_materials]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purchase = Purchase::find($id);

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

        return view ('purchase.index',  ['purchases' => $purchases]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchase::find($id);
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

        return view ('purchase.index',  ['purchases' => $purchases]);
    }
}
