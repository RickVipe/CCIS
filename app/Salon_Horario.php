<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon_Horario extends Model
{
    protected $table = 'salon_horario';
    /**
    *
    *
    * @var boolean*/
    public $timestamps = false;
    public $incrementing = false;
    public function Curso()
    {
        return $this->belongsTo('App\Curso','id_curso','id');
    }
}
