<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubContenido extends Model
{
    use HasFactory;
    public function contenidos(){
        return $this->belongsTo(Contenido::class);
    }
}
