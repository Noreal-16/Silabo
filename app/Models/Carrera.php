<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    public function departamentos(){
        return $this->belongsTo(Departamento::class);
    }
    public function periodoAcademico(){
        return $this->hasOne(periodoAcademico::class);
    }

    protected $table = 'carreras';
    protected $fillable=[
        'nombCarrera','modalidad','departamento_id'
    ];
    public $timestamps = false;
}
