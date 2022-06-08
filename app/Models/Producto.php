<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductoRelacionado;
use App\Models\TipoProducto;

use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
        'id_categoria',
        'nombre',
        'slug',
        'usos',
        'descripcion_corta',
        'descripcion',
        'ficha',
        'banner',
        'activo',
        'subtitulo',
        'altura',
        'ancho',
        'fondo',
        'alto',
        'ancho_puerta',
        'material',
        'pintura',
        'puertas_reforzadas',
        'bisagras',
        'accesorios',
        'garantia',
    ];

    protected $dates = ['deleted_at'];

    public function categoria(){
        // de 1 a  muchos (inversa)
        return $this->belongsTo('App\Models\Categoria', 'id_categoria');
    }

    public function galeriaMuchos(){
        // de uno a muchos
        return $this->hasMany('App\Models\GaleriaProducto', 'id_producto');
    }

    public function complementarios(){
        return $this->hasMany(ProductoRelacionado::class, 'id_producto')->where('estado',1);
    }


    public function tiposMuchos(){
        // de uno a muchos
        return $this->hasMany('App\Models\TipoProducto', 'id_producto');
    }
}
