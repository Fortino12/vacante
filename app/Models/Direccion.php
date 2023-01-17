<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable=[
        'calle',
        'codigoPostal',
        'colonia',
        'referencia',
        'localidad_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function localidad(){
        return $this->belongsTo(Localidad::class,'localidad_id');
    }
    
    //Relación de modelos inverso con hasMany

    public function candidato(){
        return $this->hasMany(Candidato::class);
    }
}
