<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VentaController extends Controller
{
    // POST /api/ventas
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // Verificar stock disponible
        if ($producto->stock < $request->cantidad) {
            return response()->json([
                'error' => 'Stock insuficiente. Disponible: ' . $producto->stock
            ], 400);
        }

        // Crear la venta
        $venta = Venta::create([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'fecha' => Carbon::now()
        ]);

        // Actualizar stock automáticamente
        $producto->stock -= $request->cantidad;
        $producto->save();

        return response()->json($venta->load('producto'), 201);
    }

    // GET /api/ventas
    public function index()
    {
        $ventas = Venta::with('producto')->get();
        return response()->json($ventas);
    }
}
