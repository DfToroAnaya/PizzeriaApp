<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeController;
use App\Http\Controllers\Api\UserController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 //---------------------> EMPLOYEES <---------------------
 Route::get('/employees',[EmployeController::class, 'index'])->name('employees.index');
 Route::post('/employees',[EmployeController::class, 'store'])->name('employees.store');
 Route::delete('/employees/{employee}', [EmployeController::class, 'destroy'])->name('employees.destroy');
 Route::get('/employees/{employee}', [EmployeController::class, 'show'])->name('employees.show');
 Route::put('/employees/{employee}', [EmployeController::class, 'update'])->name('employees.update');


 //---------------------> USERS <---------------------
 Route::get('/users', [UserController::class, 'index'])->name('users');