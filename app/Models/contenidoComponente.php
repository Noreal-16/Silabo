<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenidoComponente extends Model
{
    use HasFactory;
    public function actividades(){
        return $this->hasMany(Actividades::class);
    }
}
