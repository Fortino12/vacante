<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombreLocalidad',
        'municipio_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function municipio(){
        return $this->belongsTo(Municipio::class,'municipio_id');
    }
    //Relación de modelos inverso con hasMany
    public function direccion(){
        return $this->hasMany(Direccion::class);
    }
    public function oficina(){
        return $this->hasMany(Oficina::class);
    }

}
