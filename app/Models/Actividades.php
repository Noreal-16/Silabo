<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;
    public function contenidoComponente(){
        return $this->belongsTo(contenidoComponente::class);
    }
}
