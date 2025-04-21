<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Models\Producto;
use App\Models\Categoria;

Route::get('/', function () {
    $totalProductos = Producto::count();
    $totalCategorias = Categoria::count();
    $productosBajoStock = Producto::where('stock', '<', 5)->count();

    return view('welcome', compact('totalProductos', 'totalCategorias', 'productosBajoStock'));
});

Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class)->except(['show']);
