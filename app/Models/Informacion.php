<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    use HasFactory;
    public function carreras(){
        return $this->belongsTo(Carrera::class);
    }
    public function asignatura(){
        return $this->hasOne(Asignatura::class);
    }
    public function ciclo(){
        return $this->hasMany(ciclos::class);
    }
    public function creditos(){
        return $this->hasOne(Creditos::class);
    }
    public function resultados(){
        return $this->belongsTo(Resultado::class);
    }

}
