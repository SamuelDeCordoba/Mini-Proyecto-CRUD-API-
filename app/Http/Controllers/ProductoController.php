<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // GET /api/productos
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    // POST /api/productos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    // GET /api/productos/{id}
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto);
    }

    // PUT /api/productos/{id}
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'string|max:255',
            'precio' => 'numeric|min:0',
            'stock' => 'integer|min:0'
        ]);

        $producto->update($request->all());
        return response()->json($producto);
    }

    // DELETE /api/productos/{id}
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado']);
    }
}
