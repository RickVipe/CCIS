<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    /**
    *
    *
    * @var boolean*/
    public $timestamps=false;
    public $incrementing = false;

    public function Grado()
    {
        return $this->belongsTo('App\Grado','id_grado');
    }

    public function Asignatura()
    {
        return $this->belongsTo('App\Asignatura','id_asignatura');
    }
    public function Docente()
    {
        return $this->belongsTo('App\Docente','id_docente');
    }
    public function Salon_Horario()
    {
        return $this->hasMany('App\Salon_Horario','id_curso');
    }
}
