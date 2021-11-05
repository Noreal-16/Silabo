<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ciclos extends Model
{
    use HasFactory;
    public function periodoAcademico(){
        return $this->hasMany(periodoAcademico::class);
    }
    public function informacion(){
        return $this->belongsTo(Informacion::class);
    }
}
