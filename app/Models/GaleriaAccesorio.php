<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriaAccesorio extends Model
{
    protected $table = 'galeria_accesorios';

    protected $fillable = [
        'orden',
        'path',
        'accesorio_id',
    ];

    public function accesorio()
    {
        return $this->belongsTo(Accesorio::class);
    }
}
