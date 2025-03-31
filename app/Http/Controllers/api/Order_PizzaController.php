<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order_Pizza;

class Order_PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_pizzas = DB::table('order_pizzas')
            ->join('orders', 'order_pizzas.order_id', '=', 'orders.id')
            ->join('pizza_sizes', 'order_pizzas.pizza_size_id',  '=', 'pizza_sizes.id')
            ->select(
                'order_pizzas.id as code',
                'orders.id as order',
                'pizza_sizes.size as pizza_size',
                'orders.created_at as order_date',
                'order_pizzas.quantity')
            ->get();
            
        return json_encode(['order_pizzas' => $order_pizzas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'order_id' => ['required', 'max:30', 'unique'],
            'pizza_size_id' => ['required', 'number', 'min:1'],
            'quantity' => ['required', 'number', 'min:1']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $order_pizza = new Order_pizza();

        $order_pizza->order_id = $request->order_id;
        $order_pizza->pizza_size_id = $request->pizza_size_id;
        $order_pizza->quantity = $request->quantity;
        $order_pizza->save();

        $order_pizzas = DB::table('order_pizzas')
            ->join('orders', 'order_pizzas.order_id', '=', 'orders.id')
            ->join('pizza_sizes', 'order_pizzas.pizza_size_id',  '=', 'pizza_sizes.id')
            ->select(
                'order_pizzas.id as code',
                'orders.id as order',
                'pizza_sizes.size as pizza_size',
                'orders.created_at as order_date',
                'order_pizzas.quantity')
            ->get();
            
        return view ('order_pizza.index',  ['order_pizzas' => $order_pizzas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_pizza = Order_pizza::find($id);
        if (is_null($order_pizza)){
            return abort(404);
        }
        $orders = DB::table('orders')
            ->select('id')
            ->orderBy('id')
            ->get();

        $pizza_sizes = DB::table('pizza_sizes')
            ->select('id', 'size')
            ->orderBy('size')
            ->get();

        return json_encode(['order_pizza' => $order_pizza, 'orders' => $orders, 'pizza_sizes' => $pizza_sizes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'order_id' => ['required', 'max:30', 'unique'],
            'pizza_size_id' => ['required', 'number', 'min:1'],
            'quantity' => ['required', 'number', 'min:1']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $order_pizza = Order_pizza::find($id);
        if (is_null($order)){
            return abort(404);
        }
        $order_pizza->order_id = $request->order_id;
        $order_pizza->pizza_size_id = $request->pizza_size_id;
        $order_pizza->quantity = $request->quantity;
        $order_pizza->save();

        $order_pizzas = DB::table('order_pizzas')
            ->join('orders', 'order_pizzas.order_id', '=', 'orders.id')
            ->join('pizza_sizes', 'order_pizzas.pizza_size_id',  '=', 'pizza_sizes.id')
            ->select(
                'order_pizzas.id as code',
                'orders.id as order',
                'pizza_sizes.size as pizza_size',
                'orders.created_at as order_date',
                'order_pizzas.quantity')
            ->get();
            
        return json_encode(['order_pizzas' => $order_pizzas]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_pizza = Order_pizza::find($id);
        if (is_null($order)){
            return abort(404);
        }
        $order_pizza ->delete();
        $order_pizzas = DB::table('order_pizzas')
            ->join('orders', 'order_pizzas.order_id', '=', 'orders.id')
            ->join('pizza_sizes', 'order_pizzas.pizza_size_id',  '=', 'pizza_sizes.id')
            ->select(
                'order_pizzas.id as code',
                'orders.id as order',
                'pizza_sizes.size as pizza_size',
                'orders.created_at as order_date',
                'order_pizzas.quantity')
            ->get();
            
        return json_encode(['order_pizzas' => $order_pizzas]);
    }
}
