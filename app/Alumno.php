<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumno extends Authenticatable
{
    use Notifiable;
    protected $guard = 'alumno';
    public $incrementing = false;
    /**
    *timestamped
    *@var bool
    */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'fecha_nacimiento', 'direccion', 'email', 'password', 'apoderado', 'telefono',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasenia', 'remember_token',
    ];
}
