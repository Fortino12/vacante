<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombrePuesto',
        'descripcion',
    ];

    //Relación de modelos inverso con hasMany

    public function user(){
        return $this->hasMany(User::class);
    }

    public function vacante(){
        return $this->hasMany(Vacante::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimesTamps();
    }
}
