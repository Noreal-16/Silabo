<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    use HasFactory;
    public function contenidos(){
        return $this->belongsToMany(Contenido::class);
    }
    public function actividades(){
        return $this->hasMany(Actividades::class);
    }
    public function creditos(){
        return $this->hasMany(Creditos::class);
    }
}
