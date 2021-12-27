<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    public function informacion(){
        return $this->hasOne(Informacion::class);
    }

    protected $table = 'asignaturas';
    protected $fillable=[
        'presentacion','contextualizacion','contribucion', 'prerequisitos', 'adaptaciones', 'informacion_id'
    ];
    public $timestamps = false;

}
