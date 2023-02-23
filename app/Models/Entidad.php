<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre','descripcion','linkpagina','linkpqrsd','tipoentidad'
    ];

    public function logo()
    {
        return $this->hasOne(Logos::class);
    }
    public function banner()
    {
        return $this->hasOne(Banners::class);
    }


}
