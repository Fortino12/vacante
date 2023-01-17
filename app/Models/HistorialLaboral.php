<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialLaboral extends Model
{
    use HasFactory;
    protected $fillable=[
        'fechaIngreso',
        'fechaSalida',
        'tipoContrato',
        'motivo',
        'user_id',
    ];
    //Relaciónes mediante modelos Belongs To
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    //Relación de modelos inverso con hasMany
}
