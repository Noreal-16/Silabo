<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public function facultads(){
        return $this-> belongsTo(Facultad::class);
    }
    public function carreras(){
        return $this-> hasMany(Carrera::class);
    }
    protected $table = 'departamentos';
    protected $fillable=[
        'nomDepartamento','facultad_id'
    ];
    public $timestamps = false;
}
