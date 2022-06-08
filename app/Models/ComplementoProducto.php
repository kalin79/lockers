<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ComplementoProducto extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'complemento_productos';

    protected $fillable = [
        'id_producto',
    ];

    protected $dates = ['deleted_at'];
}
