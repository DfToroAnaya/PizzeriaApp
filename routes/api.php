<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PizzaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//---------------------> PIZZA <---------------------

Route::get('/pizzas',[PizzaController::class, 'index'])->name('pizzas.index');
Route::post('/pizzas',[PizzaController::class, 'store'])->name('pizzas.store');
Route::delete('/pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
Route::get('/pizzas/{pizza}', [PizzaController::class, 'show'])->name('pizzas.show');
Route::put('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');
