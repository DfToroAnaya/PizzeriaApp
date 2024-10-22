<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')   
            ->join('users', 'clients.user_id', '=', 'users.id')         
            ->join('branches', 'orders.branch_id', '=', 'branches.id') 
            ->leftJoin('employees', 'orders.delivery_person_id', '=', 'employees.id') 
            ->select(
                'orders.id as code',                 
                'users.name as client_name',          
                'branches.name as branch_name',
                'orders.total_price',                 
                'orders.status',                       
                'orders.delivery_type',                  
                'employees.id as employee_id')
            ->get();

        return view('order.index', ['orders' => $orders]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id') 
            ->select('clients.id', 'users.name') 
            ->orderBy('users.name') 
        ->get();

        $branches = DB::table('branches')
            ->select('id', 'name') 
            ->orderBy('name') 
            ->get();

        $employees = DB::table('employees')
            ->select('id')
            ->orderBy('id')
            ->get();
        
        return view('order.create', ['users' => $users, 'branches' => $branches, 'employees' => $employees]);      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client' => 'required|exists:clients,id',
            'branch' => 'required|exists:branches,id',
            'totalPrice' => 'required|numeric',
            'status' => 'required|string',
            'deliveryType' => 'required|string',
            'employee' => 'required|exists:employees,id',
        ]);

        $order = new Order();

        $order->client_id = $request->client;
        $order->branch_id = $request->branch;
        $order->total_price = $request->totalPrice;
        $order->status = $request->status;
        $order->delivery_type = $request->deliveryType;
        $order->delivery_person_id = $request->employee;
        $order->save();

        $orders = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')   
            ->join('users', 'clients.user_id', '=', 'users.id')         
            ->join('branches', 'orders.branch_id', '=', 'branches.id') 
            ->leftJoin('employees', 'orders.delivery_person_id', '=', 'employees.id') 
            ->select(
                'orders.id as code',                 
                'users.name as client_name',          
                'branches.name as branch_name',
                'orders.total_price',                  
                'orders.status',                       
                'orders.delivery_type',                     
                'employees.id as employee_id')
            ->get();

        return view('order.index', ['orders' => $orders]);
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
        $order = Order::find($id);

        $users = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id') 
            ->select('clients.id', 'users.name') 
            ->orderBy('users.name') 
        ->get();

        $branches = DB::table('branches')
            ->select('id', 'name') 
            ->orderBy('name') 
            ->get();

        $employees = DB::table('employees')
            ->select('id')
            ->orderBy('id')
            ->get();
        
        return view('order.edit', ['order' => $order, 'users' => $users, 'branches' => $branches, 'employees' => $employees]);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'client' => 'required|exists:clients,id',
            'branch' => 'required|exists:branches,id',
            'totalPrice' => 'required|numeric',
            'status' => 'required|string',
            'deliveryType' => 'required|string',
            'employee' => 'required|exists:employees,id',
        ]);
        
        $order = Order::find($id);

        $order->client_id = $request->client;
        $order->branch_id = $request->branch;
        $order->total_price = $request->totalPrice;
        $order->status = $request->status;
        $order->delivery_type = $request->deliveryType;
        $order->delivery_person_id = $request->employee;
        $order->save();

        $orders = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')   
            ->join('users', 'clients.user_id', '=', 'users.id')         
            ->join('branches', 'orders.branch_id', '=', 'branches.id') 
            ->leftJoin('employees', 'orders.delivery_person_id', '=', 'employees.id') 
            ->select(
                'orders.id as code',                 
                'users.name as client_name',          
                'branches.name as branch_name',
                'orders.total_price',                  
                'orders.status',                       
                'orders.delivery_type',                     
                'employees.id as employee_id')
            ->get();

        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order -> delete();

        $orders = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')   
            ->join('users', 'clients.user_id', '=', 'users.id')         
            ->join('branches', 'orders.branch_id', '=', 'branches.id') 
            ->leftJoin('employees', 'orders.delivery_person_id', '=', 'employees.id') 
            ->select(
                'orders.id as code',                 
                'users.name as client_name',          
                'branches.name as branch_name',
                'orders.total_price',                  
                'orders.status',                       
                'orders.delivery_type',                     
                'employees.id as employee_id')
            ->get();

        return view('order.index', ['orders' => $orders]);
    }
}
