<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaTipo extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'categoria_tipos';

    protected $fillable = [
        'nombre',
    ];

    protected $dates = ['deleted_at'];
}
