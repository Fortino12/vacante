<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaChica extends Model
{
    use HasFactory;

    protected $fillable=[
        'presupuesto',
        'perido',
        'user_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    //Relación de modelos inverso con hasMany
    public function facturacion(){
        return $this->hasMany(Facturacion::class);
    }
}
