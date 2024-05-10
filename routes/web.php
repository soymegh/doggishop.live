<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PetTypeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//verificar que el usuario este autenticado 
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home/product/{id}', [App\Http\Controllers\HomeController::class, 'showProduct'])->name('home.showProduct');
});

Route::middleware('auth')->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('pets', [PetController::class, 'index'])->name('pets.index');
    Route::get('pets/create', [PetController::class, 'create'])->name('pets.create');
    Route::post('pets', [PetController::class, 'store'])->name('pets.store');
    Route::get('pets/{id}', [PetController::class, 'show'])->name('pets.show');
    Route::get('pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
    Route::put('pets/{id}', [PetController::class, 'update'])->name('pets.update');
    Route::delete('pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('pet_types', [PetTypeController::class, 'index'])->name('pet_type.index');
    Route::get('pet_types/create', [PetTypeController::class, 'create'])->name('pet_type.create');
    Route::post('pet_types', [PetTypeController::class, 'store'])->name('pet_type.store');
    Route::get('pet_types/{id}', [PetTypeController::class, 'show'])->name('pet_type.show');
    Route::get('pet_types/{id}/edit', [PetTypeController::class, 'edit'])->name('pet_type.edit');
    Route::put('pet_types/{id}', [PetTypeController::class, 'update'])->name('pet_type.update');
    Route::delete('pet_types/{id}', [PetTypeController::class, 'destroy'])->name('pet_type.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('providers', [ProviderController::class, 'index'])->name('providers.index');
    Route::get('providers/create', [ProviderController::class, 'create'])->name('providers.create');
    Route::post('providers', [ProviderController::class, 'store'])->name('providers.store');
    Route::get('providers/{id}', [ProviderController::class, 'show'])->name('providers.show');
    Route::get('providers/{id}/edit', [ProviderController::class, 'edit'])->name('providers.edit');
    Route::put('providers/{id}', [ProviderController::class, 'update'])->name('providers.update');
    Route::delete('providers/{id}', [ProviderController::class, 'destroy'])->name('providers.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});

//Usuario Gues
Route::middleware('auth')->group(function () {
    Route::get('Cliente', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
});
//