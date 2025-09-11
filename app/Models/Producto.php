<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'orden',
        'path',
        'titulo',
        'descripcion',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function galeria()
    {
        return $this->hasMany(Galeria::class)->orderBy('orden', 'asc');
    }
}
