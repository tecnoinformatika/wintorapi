<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenPublicitaria extends Model
{
    use HasFactory;
    // Declaro los campos que usaré de la tabla 'img_bicicletas'
    protected $fillable = ['nombre', 'formato', 'publicidad_id'];

    // Relación Inversa (Opcional)
    public function publicidad()
    {
    	return $this->belongsTo(publicidad::class);
    }
}
