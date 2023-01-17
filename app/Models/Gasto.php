<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $fillable=[
        'tipogasto',
    ];

    //Relaciónes mediante modelos Belongs To
    //Relación de modelos inverso con hasMany
    public function facturacion(){
        return $this->hasMany(Facturacion::class);
    }
}
