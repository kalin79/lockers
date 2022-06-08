<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Producto;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoRelacionado extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'producto_relacionados';

    protected $fillable = [
        'id_producto',
        'id_producto_relacionado',
        'estado',
    ];

    protected $dates = ['deleted_at'];

    public function dataProducto()
    {
        return $this->belongsTo(Producto::class, 'id_producto_relacionado');
    }
}
