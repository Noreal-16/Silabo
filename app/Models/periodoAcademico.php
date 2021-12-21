<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periodoAcademico extends Model
{
    use HasFactory;
    public function carreras(){
        return $this->hasOne(Carrera::class);
    }
    public function ciclo(){
        return $this->belongsTo(ciclos::class);
    }
    protected $table = 'periodos';
    protected $fillable=[
        'fechaInicio','fechaFin','carrera_id'
    ];
    public $timestamps = false;
}
