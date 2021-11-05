<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditos extends Model
{
    use HasFactory;
    public function informacion(){
        return $this->hasOne(Informacion::class);
    }
    public function componente(){
        return $this->hasMany(Componente::class);
    }
}
