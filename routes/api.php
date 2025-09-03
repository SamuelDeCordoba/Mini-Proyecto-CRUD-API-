<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// CRUD completo de productos
Route::apiResource('productos', ProductoController::class);

// Rutas de ventas
Route::get('ventas', [VentaController::class, 'index']);
Route::post('ventas', [VentaController::class, 'store']);

// Reporte de ventas
Route::get('reporte-ventas', [ReporteController::class, 'reporteVentas']);
