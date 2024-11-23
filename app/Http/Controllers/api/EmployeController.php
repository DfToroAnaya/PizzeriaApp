<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = DB::table('employees')
        ->join('users', 'employees.user_id', '=', 'users.id')
        ->select('employees.*','users.name')
        ->get();
        return json_encode(['employees'=>$employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate=Validator::make($request->all(),[

       'position'=>['required'], 
       'salary'=>['required', 'numeric'],
       'hire_date'=>['required', 'date']
        ]);

        if($validate->fails()){
            return response()->json([
                'msg' =>'Se produjo un error en la validacion de la informacion',
                'statusCode'=> 400
            ]);
        }
        

        $employee=new Employee();

        $employee->user_id =$request->user_id ;
        $employee->position=$request->position;
        $employee->identification_number=$request->identification_number;
        $employee->salary=$request->salary;
        $employee->hire_date=$request->hire_date;
        $employee->save();
        return json_encode(['employee'=>$employee]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        if(is_null($employee)){
            return abort(404);
        }

        $users=DB::table('users')
        ->orderBy('name')
        ->get();

        return json_encode(['employee' => $employee, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate=Validator::make($request->all(),[

            'position'=>['required'], 
           
            'salary'=>['required', 'numeric'],
            'hire_date'=>['required', 'date']
             ]);
     
             if($validate->fails()){
                 return response()->json([
                     'msg' =>'Se produjo un error en la validacion de la informacion',
                     'statusCode'=> 400
                 ]);
             }


        $employee=Employee::find($id);
        if(is_null($employee)){
            return abort(404);
        }
        $employee->user_id =$request->user_id ;
        $employee->position=$request->position;
        $employee->identification_number=$request->identification_number;
        $employee->salary=$request->salary;
        $employee->hire_date=$request->hire_date;
        $employee->save();
        return json_encode(['employee' => $employee]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee=Employee::find($id);
        if(is_null($employee)){
            return abort(404);
        }
        $employee->delete();


        $employees = DB::table('employees')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->select('employees.*','users.name')
            ->get();
            return json_encode(['employees' => $employees, 'success' => true]);
    }
}
