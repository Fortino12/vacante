<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombreMunicipio',
        'estado_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }
    //Relación de modelos inverso con hasMany
    public function localidad(){
        return $this->hasMany(Localidad::class);
    }
    public function vacante(){
        return $this->hasMany(Vacante::class);
    }
}
