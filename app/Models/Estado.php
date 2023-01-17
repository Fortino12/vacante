<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillabl=[
        'nombreEstado',
    ];

    //Relaciónes mediante modelos Belongs To
    //Relación de modelos inverso con hasMany
    public function municipio(){
        return $this->hasMany(Municipio::class);
    }
}
