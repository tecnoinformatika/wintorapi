<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'duracion',
        'propietario',
        'url',
        'activo'
    ];

    public function imagenpublicitaria()
    {
        return $this->hasOne(ImagenPublicitaria::class);
    }
}
