<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdireccion extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombreSubdireccion',
        'oficina_id',
        'user_id',
        'drv_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function oficina(){
        return $this->belongsTo(Oficina::class,'oficina_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function drv(){
        return $this->belongsTo(Drv::class,'drv_id');
    }
    //Relación de modelos inverso con hasMany
}
