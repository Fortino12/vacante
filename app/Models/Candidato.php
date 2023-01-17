<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'paterno',
        'materno',
        'fechaNacimiento',
        'nivelEstudio',
        'email',
        'telefono',
        'curp',
        'rfc',
        'foto',
        'estatus',
        'direccion_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function direccion(){
        return $this->belongsTo(Direccion::class,'direccion_id');
    }
    //Relación de modelos inverso con hasMany
}
