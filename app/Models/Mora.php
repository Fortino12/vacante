<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mora extends Model
{
    use HasFactory;

    protected $fillable=[
        'indice',
        'oficina_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function oficina(){
        return $this->belongsTo(Oficina::class,'oficina_id');
    }
    //Relación de modelos inverso con hasMany
}
