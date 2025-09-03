<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable = [
        'producto_id',
        'cantidad',
        'fecha'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
