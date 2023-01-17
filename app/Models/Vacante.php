<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombreVacante',
        'numVacante',
        'puesto_id',
        'municipio_id',
    ];
    //Relaciónes mediante modelos Belongs To
    public function puesto(){
        return $this->belongsTo(Puesto::class,'puesto_id');
    }
    public function municipio(){
        return $this->belongsTo(Municipio::class,'municipio_id');
    }
    //Relación de modelos inverso con hasMany
}
