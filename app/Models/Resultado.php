<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    public function contenidos(){
        return $this->hasMany(Contenido::class);
    }
    public function informacion(){
        return $this->hasMany(Informacion::class);
    }
}
