<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'tipos';

    protected $fillable = [
        'id_categoria_tipo',
        'nombre',
        'valor',
    ];

    protected $dates = ['deleted_at'];

    public function categoria(){
        // de 1 a  muchos (inversa)
        return $this->belongsTo('App\Models\CategoriaTipo', 'id_categoria_tipo');
    }

    
}
