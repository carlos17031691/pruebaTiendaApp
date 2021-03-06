<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ruta principal
Route::get('/', [App\Http\Controllers\StoreController::class, 'index'])->name('store');

Route::middleware(['auth'])->group(function () {
    //Rutas generales
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    
    //Rutas para administración de Marcas
    Route::get('brands', [App\Http\Controllers\BrandController::class, 'index'])->name('brands.index');
    Route::get('brands/create', [App\Http\Controllers\BrandController::class, 'create'])->name('brands.create');
    Route::post('brands', [App\Http\Controllers\BrandController::class, 'store'])->name('brands.store');
    Route::get('brands/{id}', [App\Http\Controllers\BrandController::class, 'edit'])->name('brands.edit');
    Route::post('brands/{id}', [App\Http\Controllers\BrandController::class, 'update'])->name('brands.update');
    Route::delete('brands/{id}', [App\Http\Controllers\BrandController::class, 'destroy'])->name('brands.destroy');

    //Rutas para administración de Productos
    Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::post('products/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

});


require __DIR__.'/auth.php';

Auth::routes();

