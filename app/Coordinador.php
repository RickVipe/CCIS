<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Coordinador extends Authenticatable
{
    use Notifiable;
    protected $guard = 'coordinador';
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
        'nombres', 'apellidos', 'email', 'password',
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
