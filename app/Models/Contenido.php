<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;
    public function resultados(){
        return $this->hasMany(Resultado::class);
    }
    public function subContenidos(){
        return $this->hasMany(SubContenido::class);
    }
    public function componentes(){
        return $this->belongsToMany(Componente::class);
    }
    
}
