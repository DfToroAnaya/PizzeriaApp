<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order_Extra_IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_extra_ingredients= DB::table('order_extra_ingredients')
        ->join('orders', 'order_extra_ingredients.order_id', '=', 'orders.id')
        ->join('extra_ingredients', 'order_extra_ingredients.extra_ingredient_id'  , '=', 'extra_ingredients.id')
        ->select('order_extra_ingredients.id as code',
                 'orders.total_price as price',
                 'extra_ingredients.name as name_ingredient',
                 'order_extra_ingredients.quantity')
        ->get();

        return json_encode(['order_extra_ingredients' => $order_extra_ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => ['required', 'numeric', 'min:1'],
            'order_id' => ['required', 'numeric', 'min:1'],
            'extra_ingredient_id' => ['required', 'numeric', 'min:1'],
            'quantity' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $order_extra_ingredient =  new Order_extra_ingredient();
        $order_extra_ingredient->id = $request->id;
        $order_extra_ingredient->order_id = $request->order_id;
        $order_extra_ingredient->extra_ingredient_id = $request->extra_ingredient_id;
        $order_extra_ingredient->quantity = $request->quantity;
        $order_extra_ingredient->save();
        return json_encode(['order_extra_ingredients' => $order_extra_ingredients]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_extra_ingredient = Order_extra_ingredient::find($id);
        if (is_null($order_extra_ingredient)){
            return abort(404);
        }
        $orders = DB::table('orders')
            ->select('id', 'total_price')
            ->orderBy('total_price')
            ->get();

            $extra_ingredients = DB::table('extra_ingredients')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

            return json_encode(['order_extra_ingredient' => $order_extra_ingredient,'orders' => $orders, 'extra_ingredients' => $extra_ingredients]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order_extra_ingredient = Order_extra_ingredient::find($id);
        //$order_extra_ingredient->id = $request->id;
        $order_extra_ingredient->order_id = $request->order_id;
        $order_extra_ingredient->extra_ingredient_id = $request->extra_ingredient_id;
        $order_extra_ingredient->quantity = $request->quantity;
        $order_extra_ingredient->save();
        return json_encode(['order_extra_ingredients' => $order_extra_ingredients]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_extra_ingredient = Order_extra_ingredient::find($id);
        $order_extra_ingredient->delete();
        $order_extra_ingredients= DB::table('order_extra_ingredients')
        ->join('orders', 'order_extra_ingredients.order_id', '=', 'orders.id')
        ->join('extra_ingredients', 'order_extra_ingredients.extra_ingredient_id'  , '=', 'extra_ingredients.id')
        ->select('order_extra_ingredients.id as code',
                 'orders.total_price as price',
                 'extra_ingredients.name as name_ingredient',
                 'order_extra_ingredients.quantity')
        ->get();
        return json_encode(['order_extra_ingredients' => $order_extra_ingredients, 'success' => true]);
    }
}
