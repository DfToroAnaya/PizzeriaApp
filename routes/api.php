<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\Order_PizzaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//ROUTES CLIENTS
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

//ROUTES ORDERS
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');

//ROUTES ORDER_PIZZAS
Route::get('/order_pizzas', [Order_PizzaController::class, 'index'])->name('order_pizzas');
Route::post('/order_pizzas', [Order_PizzaController::class, 'store'])->name('order_pizzas.store');
Route::get('/order_pizzas/create', [Order_PizzaController::class, 'create'])->name('order_pizzas.create');
Route::delete('/order_pizzas/{order_pizza}', [Order_PizzaController::class, 'destroy'])->name('order_pizzas.destroy');
Route::put('/order_pizzas/{order_pizza}', [Order_PizzaController::class, 'update'])->name('order_pizzas.update');
Route::get('/order_pizzas/{order_pizza}/edit', [Order_PizzaController::class, 'edit'])->name('order_pizzas.edit');

