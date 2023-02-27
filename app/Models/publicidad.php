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
        'propietario'
    ];

    public function imagenpublicitaria()
    {
        return $this->hasOne(ImagenPublicitaria::class);
    }
}
