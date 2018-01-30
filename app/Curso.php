<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
    *
    *
    * @var boolean*/
    public $timestamps=false;

    public function Grado()
    {
        return $this->belongsTo('App\Grado','id_grado');
    }

    public function Asignatura()
    {
        return $this->belongsTo('App\Asignatura','id_asignatura');
    }
}
