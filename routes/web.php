<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\Extra_IngredientController;
use App\Http\Controllers\BrancheController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


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
});

require __DIR__.'/auth.php';
