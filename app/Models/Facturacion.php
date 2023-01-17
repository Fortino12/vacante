<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    use HasFactory;

    protected $fillable=[
        'monto',
        'comprobante',
        'fechaFacturacion',
        'caja_id',
        'gasto_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function caja(){
        return $this->belongsTo(CajaChica::class,'caja_id');
    }
    public function gasto(){
        return $this->belongsTo(Gasto::class,'gasto_id');
    }
    //Relación de modelos inverso con hasMany
}
