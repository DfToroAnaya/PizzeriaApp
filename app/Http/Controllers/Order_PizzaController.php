<?php

namespace App\Http\Controllers;

use App\Models\Order_pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            
        return view ('order_pizza.index',  ['order_pizzas' => $order_pizzas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = DB::table('orders')
            ->select('id')
            ->orderBy('id')
            ->get();

        $pizza_sizes = DB::table('pizza_sizes')
            ->select('id', 'size')
            ->orderBy('size')
            ->get();

        return view('order_pizza.create', ['orders' => $orders, 'pizza_sizes' => $pizza_sizes]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order_pizza = new Order_pizza();

        $order_pizza->order_id = $request->order;
        $order_pizza->pizza_size_id = $request->pizzaSize;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order_pizza = Order_pizza::find($id);

        $orders = DB::table('orders')
            ->select('id')
            ->orderBy('id')
            ->get();

        $pizza_sizes = DB::table('pizza_sizes')
            ->select('id', 'size')
            ->orderBy('size')
            ->get();

        return view('order_pizza.edit', ['order_pizza' => $order_pizza, 'orders' => $orders, 'pizza_sizes' => $pizza_sizes]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order_pizza = Order_pizza::find($id);

        $order_pizza->order_id = $request->order;
        $order_pizza->pizza_size_id = $request->pizzaSize;
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_pizza = Order_pizza::find($id);
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
            
        return view ('order_pizza.index',  ['order_pizzas' => $order_pizzas]);
    }
}
