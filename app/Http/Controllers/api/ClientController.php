<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('clients.*', "users.name")
            ->get();
        return json_encode(['clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => ['required', 'max:30', 'unique'],
            'address' => ['required', 'string', 'min:1'],
            'phone' => ['required', 'string', 'min:1']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $client = new Client();
        $client -> user_id = $request -> user_id;
        $client -> address = $request -> address;
        $client -> phone = $request -> phone;
        $client -> save();

        $clients = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('clients.*', 'users.name')
            ->get();
        return json_encode(['clients' => $clients]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        if (is_null($client)){
            return abort(404);
        }
        $users = DB::table('users')
            ->orderBy('name')
            ->get();
        return json_encode(['client' => $client, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => ['required', 'max:30', 'unique'],
            'address' => ['required', 'string', 'min:1'],
            'phone' => ['required', 'string', 'min:1']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $client = Client::find($id);
        if (is_null($client)){
            return abort(404);
        }
        $client -> user_id = $request -> user_id;
        $client -> address = $request -> address;
        $client -> phone = $request -> phone;
        $client -> save();
        return json_encode(['clients' => $clients]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        if (is_null($client)){
            return abort(404);
        }
        $client -> delete();
        $clients = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('clients.*', 'users.name')
            ->get();
        return json_encode(['clients' => $clients, 'success' => true]);
    }
}
