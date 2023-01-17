<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    protected $fiilable=[
        'oficina',
        'tipo',
        'email',
        'localidad_id',
        'user_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function localidad(){
        return $this->belongsTo(Localidad::class,'localidad_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    //Relación de modelos inverso con hasMany
    public function horario(){
        return $this->hasMany(Horario::class);
    }

    public function mora(){
        return $this->hasMany(Mora::class);
    }

    public function requesision(){
        return $this->hasMany(Requesicion::class);
    }

    public function subdireccion(){
        return $this->hasMany(Subdireccion::class);
    }
}
