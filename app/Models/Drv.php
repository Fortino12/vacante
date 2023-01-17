<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drv extends Model
{
    use HasFactory;

    protected $fillable=[
        'drv',
        'user_id',
    ];

    //Relaciónes mediante modelos Belongs To
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    //Relación de modelos inverso con hasMany
    public function subdireccion(){
        return $this->hasMany(Subdireccion::class);
    }
}
