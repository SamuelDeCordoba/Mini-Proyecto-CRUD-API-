<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    // GET /api/reporte-ventas
    public function reporteVentas()
    {
        $reporte = DB::table('productos')
            ->join('ventas', 'productos.id', '=', 'ventas.producto_id')
            ->select(
                'productos.nombre as producto',
                DB::raw('SUM(ventas.cantidad) as total_vendido'),
                DB::raw('SUM(ventas.cantidad * productos.precio) as ingresos')
            )
            ->groupBy('productos.id', 'productos.nombre', 'productos.precio')
            ->orderBy('total_vendido', 'desc')
            ->get();

        return response()->json($reporte);
    }
}
