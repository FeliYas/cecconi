<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaAccesorio extends Model
{
    protected $table = 'accesorios_categorias';
    protected $fillable = ['orden', 'titulo'];

    public function accesorios()
    {
        return $this->hasMany(Accesorio::class, 'accesorio_categoria_id');
    }
}
