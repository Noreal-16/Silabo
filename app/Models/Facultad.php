<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    public function departamentos(){
        return $this-> hasMany(Departamento::class);
    }
    protected $table = 'facultads';
    protected $fillable=[
        'nomFacultad'
    ];
    public $timestamps = false;
}
