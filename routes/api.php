<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Pizza_SizesController;
use App\Http\Controllers\api\Order_Extra_IngredientController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\api\Raw_MaterialController;
use App\Http\Controllers\api\PizzaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Pizzas_sizes Rutas-------------------------------------------------------------------------------------------------------------------
Route::get('/pizza_sizes', [Pizza_SizesController::class, 'index'])->name('pizza_sizes');
Route::post('/pizza_sizes', [Pizza_SizesController::class, 'store'])->name('pizza_sizes.store');
Route::delete('/pizza_sizes/{pizza_size}', [Pizza_SizesController::class , 'destroy'])->name('pizza_sizes.destroy');
Route::put('/pizza_sizes/{pizza_size}', [Pizza_SizesController::class, 'update'])->name('pizza_sizes.update');
Route::get('/pizza_sizes/{pizza_size}', [Pizza_SizesController::class, 'show'])->name('pizza_sizes.show');

//Order Extra Ingredient Rutas-------------------------------------------------------------------------------------------------------------------
Route::get('/order_extra_ingredients', [Order_Extra_IngredientController::class, 'index'])->name('order_extra_ingredients');
Route::post('/order_extra_ingredients', [Order_Extra_IngredientController::class, 'store'])->name('order_extra_ingredients.store');
Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [Order_Extra_IngredientController::class,  'destroy'])->name('order_extra_ingredients.destroy');
Route::put('/order_extra_ingredients/{order_extra_ingredient}', [Order_Extra_IngredientController::class, 'update'])->name('order_extra_ingredients.update');
Route::get('/order_extra_ingredients/{order_extra_ingredient}', [Order_Extra_IngredientController::class, 'show'])->name('order_extra_ingredients.show');

//Supplier Rutas-------------------------------------------------------------------------------------------------------------------
Route::get('/suppliers',[SupplierController::class, 'index'])->name('suppliers');
Route::post('/suppliers',[SupplierController::class, 'store'])->name('suppliers.store');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');


Route::get('/raw_materials',[Raw_MaterialController::class, 'index'])->name('raw_materials');
Route::post('/raw_materials',[Raw_MaterialController::class, 'store'])->name('raw_materials.store');
Route::delete('/raw_materials/{raw_material}', [Raw_MaterialController::class, 'destroy'])->name('raw_materials.destroy');
Route::put('/raw_materials/{raw_material}', [Raw_MaterialController::class, 'update'])->name('raw_materials.update');
Route::get('/raw_materials/{raw_material}', [Raw_MaterialController::class, 'show'])->name('raw_materials.show');



//Pizzas Rutas-------------------------------------------------------------------------------------------------------------------
Route::get('/pizzas',[PizzaController::class, 'index'])->name('pizzas.index');
Route::post('/pizzas',[PizzaController::class, 'store'])->name('pizzas.store');
Route::delete('/pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
Route::get('/pizzas/{pizza}', [PizzaController::class, 'show'])->name('pizzas.show');
Route::put('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');
