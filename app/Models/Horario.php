<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable=[
        'fecha',
        'horaEntrada',
        'horaSalida',
        'oficina_id',
        'user_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function oficina(){
        return $this->belongsTo(Oficina::class,'oficina_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    //Relación de modelos inverso con hasMany
}
