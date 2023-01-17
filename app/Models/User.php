<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numeroNomina',
        'nombre',
        'paterno',
        'materno',
        'email',
        'password',
        'telefono',
        'fechaNacimiento',
        'foto',
        'puesto_id',
    ];

    //Relaciónes mediante modelos Belongs To

    public function puesto(){
        return $this->belongsTo(Puesto::class,'puesto_id');
    }

    //Relación de modelos inverso con hasMany

    public function cajaChica(){
        return $this->hasMany(CajaChica::class);
    }

    public function drv(){
        return $this->hasMany(Drv::class);
    }

    public function historialLAboral(){
        return $this->hasMany(HistorialLaboral::class);
    }

    public function horario(){
        return $this->hasMany(Horario::Class);
    }
    
    public function oficina(){
        return $this->hasMany(Oficina::class);
    }
    
    public function subdireccion(){
        return $this->hasMany(Subdireccion::class);
    }

    public function puestos(){
        return $this->belongsToMany(Puesto::class)->withTimesTamps();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
