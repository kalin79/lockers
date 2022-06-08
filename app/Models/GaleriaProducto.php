<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class GaleriaProducto extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'galeria_productos';

    protected $fillable = [
        'id_producto',
        'foto',
        'activo',
        'default',
    ];

    protected $dates = ['deleted_at'];
}
