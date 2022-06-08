<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProducto extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'tipo_productos';

    protected $fillable = [
        'id_tipo',
        'id_producto'
    ];

    protected $dates = ['deleted_at'];

    public function tipo(){
        return $this->hasOne('App\Models\Tipo','id_tipo');
    }
}
