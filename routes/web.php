<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\Extra_IngredientController;
use App\Http\Controllers\Pizza_SizesController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\Order_Extra_IngredientController;
use App\Http\Controllers\EmployeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizza_sizes', [Pizza_SizesController::class, 'index'])->name('pizza_sizes.index');
Route::post('/pizza_sizes', [Pizza_SizesController::class, 'store'])->name('pizza_sizes.store');
Route::get('/pizza_sizes/create', [Pizza_SizesController::class, 'create'])->name('pizza_sizes.create');
Route::delete('/pizza_sizes/{pizza_size}', [Pizza_SizesController::class , 'destroy'])->name('pizza_sizes.destroy');
Route::put('/pizza_sizes/{pizza_size}', [Pizza_SizesController::class, 'update'])->name('pizza_sizes.update');
Route::get('/pizza_sizes/{pizza_size}/edit', [Pizza_SizesController::class, 'edit'])->name('pizza_sizes.edit');

Route::get('/order_extra_ingredients', [Order_Extra_IngredientController::class, 'index'])->name('order_extra_ingredients.index');
Route::post('/order_extra_ingredients', [Order_Extra_IngredientController::class, 'store'])->name('order_extra_ingredients.store');
Route::get('/order_extra_ingredients/create', [Order_Extra_IngredientController::class, 'create'])->name('order_extra_ingredients.create');
Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [Order_Extra_IngredientController::class,  'destroy'])->name('order_extra_ingredients.destroy');
Route::put('/order_extra_ingredients/{order_extra_ingredient}', [Order_Extra_IngredientController::class, 'update'])->name('order_extra_ingredients.update');
Route::get('/order_extra_ingredients/{order_extra_ingredient}/edit', [Order_Extra_IngredientController::class, 'edit'])->name('order_extra_ingredients.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ROUTES CLIENTS
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

    //ROUTES ORDERS
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    


    //---------------------> PIZZA <---------------------

    Route::get('/pizzas',[PizzaController::class, 'index'])->name('pizzas.index');
    Route::post('/pizzas',[PizzaController::class, 'store'])->name('pizzas.store');
    Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
    Route::delete('/pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
    Route::put('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');
    Route::get('/pizzas/{pizza}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');

    //---------------------> INGREDIENTS <---------------------

    Route::get('/ingredients',[IngredientController::class, 'index'])->name('ingredients.index');
    Route::post('/ingredients',[IngredientController::class, 'store'])->name('ingredients.store');
    Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
    Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');
    Route::put('/ingredients/{ingredient}', [IngredientController::class, 'update'])->name('ingredients.update');
    Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');

    //---------------------> RXTRA INGREDIENTS <---------------------

    Route::get('/extra_ingredients',[Extra_IngredientController::class, 'index'])->name('extra_ingredients.index');
    Route::post('/extra_ingredients',[Extra_IngredientController::class, 'store'])->name('extra_ingredients.store');
    Route::get('/extra_ingredients/create', [Extra_IngredientController::class, 'create'])->name('extra_ingredients.create');
    Route::delete('/extra_ingredients/{extra_ingredient}', [Extra_IngredientController::class, 'destroy'])->name('extra_ingredients.destroy');
    Route::put('/extra_ingredients/{extra_ingredient}', [Extra_IngredientController::class, 'update'])->name('extra_ingredients.update');
    Route::get('/extra_ingredients/{extra_ingredient}/edit', [Extra_IngredientController::class, 'edit'])->name('extra_ingredients.edit');


    //---------------------> BRANCHES <---------------------
    Route::get('/branches',[BrancheController::class, 'index'])->name('branches.index');
    Route::post('/branches',[BrancheController::class, 'store'])->name('branches.store');
    Route::get('/branches/create', [BrancheController::class, 'create'])->name('branches.create');
    Route::delete('/branches/{branche}', [BrancheController::class, 'destroy'])->name('branches.destroy');
    Route::put('/branches/{branche}', [BrancheController::class, 'update'])->name('branches.update');
    Route::get('/branches/{branche}/edit', [BrancheController::class, 'edit'])->name('branches.edit');

    //---------------------> EMPLOYEES <---------------------
    Route::get('/employees',[EmployeController::class, 'index'])->name('employees.index');
    Route::post('/employees',[EmployeController::class, 'store'])->name('employees.store');
    Route::get('/employees/create', [EmployeController::class, 'create'])->name('employees.create');
    Route::delete('/employees/{employee}', [EmployeController::class, 'destroy'])->name('employees.destroy');
    Route::put('/employees/{employee}', [EmployeController::class, 'update'])->name('employees.update');
    Route::get('/employees/{employee}/edit', [EmployeController::class, 'edit'])->name('employees.edit');



    //ROUTES CLIENTS
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

    //ROUTES ORDERS
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');



    

});

require __DIR__.'/auth.php';
