<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lineasAtencion extends Model
{
    use HasFactory;

    protected fillable = [
        'entidad_id','linea','nombre','opcion'
    ]
}
