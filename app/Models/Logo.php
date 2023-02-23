<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    // Declaro los campos que usaré de la tabla 'img_bicicletas' 
    protected $fillable = ['nombre', 'formato', 'entidad_id'];
 
    // Relación Inversa (Opcional)
    public function logo()
    {
    	return $this->belongsTo(Entidad::class);
    }

    public function getUrlPathAttribute()
    {
        return \Storage::url($this->nombre);
    }
}
