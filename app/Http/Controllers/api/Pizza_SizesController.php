<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Pizza_SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizza_sizes= DB::table('pizza_sizes')
        ->join('pizzas', 'pizza_sizes.pizzas_id', '=', 'pizzas.id')
        ->select('pizza_sizes.*', 'pizzas.name')
        ->get();

        return json_encode(['pizza_sizes' => $pizza_sizes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => ['required', 'numeric', 'min:1'],
            'pizzas_id' => ['required', 'numeric', 'min:1'],
            'size' => ['required', 'max:30', 'unique:pizza_sizes,size'],
            'price' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $pizza_size = new Pizza_size();
        $pizza_size->id = $request->id;
        $pizza_size->pizzas_id = $request->pizzas_id;
        $pizza_size->size = $request->size;
        $pizza_size->price =$request->price;
        $pizza_size->save();
        return json_encode(['pizza_size' => $pizza_size]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizza_size = Pizza_size::find($id);
        if (is_null($pizza_size)){
            return abort(404);
        }
        $pizzas = DB::table('pizzas')
        ->orderBy('name')
        ->get();

        return json_encode(['pizza_size' => $pizza_size, 'pizzas' => $pizzas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza_size =  Pizza_size::find($id);
        //$pizza_size->id = $request->id;
        $pizza_size->pizzas_id = $request->pizzas_id;
        $pizza_size->size = $request->size;
        $pizza_size->price =$request->price;
        $pizza_size->save();
        return json_encode(['pizza_sizes' => $pizza_sizes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza_size = Pizza_size::find($id);
        $pizza_size->delete();
        $pizza_sizes= DB::table('pizza_sizes')
        ->join('pizzas', 'pizza_sizes.pizzas_id', '=', 'pizzas.id')
        ->select('pizza_sizes.*', 'pizzas.name')
        ->get();
        return json_encode(['pizza_sizes' => $pizza_sizes, 'success' => true]);
    }
}
