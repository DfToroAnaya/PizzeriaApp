<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

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

        return json_encode(['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'client_id' => ['required', 'max:30', 'unique'],
            'branch_id' => ['required', 'number', 'min:1'],
            'total_price' => ['required', 'string', 'min:1'],
            'status' => ['required', 'string', 'min:1'],
            'delivery_type' => ['required', 'string', 'min:1'],
            'delivery_person_id' => ['required', 'string', 'min:1']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $order = new Order();
        $order->client_id = $request->client_id;
        $order->branch_id = $request->branch_id;
        $order->total_price = $request->total_price;
        $order->status = $request->status;
        $order->delivery_type = $request->delivery_type;
        $order->delivery_person_id = $request->delivery_person_id;
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

        return json_encode(['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        if (is_null($order)){
            return abort(404);
        }
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
        
        return json_encode(['order' => $order, 'users' => $users, 'branches' => $branches, 'employees' => $employees]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'client_id' => ['required', 'max:30', 'unique'],
            'branch_id' => ['required', 'number', 'min:1'],
            'total_price' => ['required', 'string', 'min:1'],
            'status' => ['required', 'string', 'min:1'],
            'delivery_type' => ['required', 'string', 'min:1'],
            'delivery_person_id' => ['required', 'string', 'min:1']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $order = Order::find($id);
        if (is_null($order)){
            return abort(404);
        }
        $order->client_id = $request->client_id;
        $order->branch_id = $request->branch_id;
        $order->total_price = $request->total_price;
        $order->status = $request->status;
        $order->delivery_type = $request->delivery_type;
        $order->delivery_person_id = $request->delivery_person_id;
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
        if (is_null($order)){
            return abort(404);
        }
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

        return json_encode(['orders' => $orders, 'success' => true]);
    }
}
