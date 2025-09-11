<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    protected $table = 'accesorios_productos';
    protected $fillable = [
        'accesorio_categoria_id',
        'orden',
        'path',
        'titulo',
        'descripcion',
        'destacado',
    ];
    public function categoria()
    {
        return $this->belongsTo(CategoriaAccesorio::class, 'accesorio_categoria_id');
    }
    public function galeria()
    {
        return $this->hasMany(GaleriaAccesorio::class, 'accesorio_id');
    }
}
