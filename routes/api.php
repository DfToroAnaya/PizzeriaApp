<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Pizza_IngredientController;
use App\Http\Controllers\Api\BrancheController;
use App\Http\Controllers\Api\PizzaController;
use App\Http\Controllers\Api\IngredientController;
use App\Http\Controllers\Api\Pizza_Raw_MaterialController;




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


  //---------------------> PIZZA_INGREDIENTS <---------------------
  Route::get('/pizza_ingredients',[Pizza_IngredientController::class, 'index'])->name('pizza_ingredients.index');
  Route::post('/pizza_ingredients',[Pizza_IngredientController::class, 'store'])->name('pizza_ingredients.store');
  Route::delete('/pizza_ingredients/{pizza_ingredient}', [Pizza_IngredientController::class, 'destroy'])->name('pizza_ingredients.destroy');
  Route::get('/pizza_ingredients/{pizza_ingredient}',[Pizza_IngredientController::class, 'show'])->name('pizza_ingredients.show');
  Route::put('/pizza_ingredients/{pizza_ingredient}', [Pizza_IngredientController::class, 'update'])->name('pizza_ingredients.update');
 

  //---------------------> PIZZA <---------------------

  Route::get('/pizzas',[PizzaController::class, 'index'])->name('pizzas.index');


  //---------------------> INGREDIENTS <---------------------
  
  Route::get('/ingredients',[IngredientController::class, 'index'])->name('ingredients.index');

  //---------------------> BRANCHES <---------------------
  
  Route::get('/branches',[BrancheController::class, 'index'])->name('branches.index');
  Route::post('/branches',[BrancheController::class, 'store'])->name('branches.store');
  Route::delete('/branches/{branche}', [BrancheController::class, 'destroy'])->name('branches.destroy');
  Route::get('/branches/{branche}',[BrancheController::class, 'show'])->name('branches.show');
  Route::put('/branches/{branche}', [BrancheController::class, 'update'])->name('branches.update');

  //---------------------> PIZZA_RAW_MATERIAL <---------------------
 
  Route::get('/pizza_raw_materials',[Pizza_Raw_MaterialController::class, 'index'])->name('pizza_raw_materials.index');
  Route::post('/pizza_raw_materials',[Pizza_Raw_MaterialController::class, 'store'])->name('pizza_raw_materials.store');
  Route::delete('/pizza_raw_materials/{pizza_raw_material}', [Pizza_Raw_MaterialController::class, 'destroy'])->name('pizza_raw_materials.destroy');
  Route::get('/pizza_raw_materials/{pizza_raw_material}',[Pizza_Raw_MaterialController::class, 'show'])->name('pizza_raw_materials.show');
  Route::put('/pizza_raw_materials/{pizza_raw_material}', [Pizza_Raw_MaterialController::class, 'update'])->name('pizza_raw_materials.update');

  //---------------------> PIZZA_RAW_MATERIAL <---------------------
 
  Route::get('/raw_materials',[Raw_MaterialController::class, 'index'])->name('raw_materials.index');


