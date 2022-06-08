<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Producto; 
use App\Models\GaleriaProducto; 

class Categoria extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'descripcion_corta',
        'foto',
        'banner',
    ];

    protected $dates = ['deleted_at'];

    public function productos_relacionados()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }

}
