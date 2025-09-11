<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table = 'contenidos_home';
    protected $fillable = [
        'path',
        'titulo',
        'descripcion',
    ];
}
