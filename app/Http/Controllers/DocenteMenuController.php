<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Curso;
use App\Grado;
use App\Asignatura;
use App\Nota;
use App\Matricula;

class DocenteMenuController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
       $this->middleware('auth:docente');
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('docentesmenu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verPerfil()
    {
        $docente = Auth::user();
        return view('docentesmenu.verPerfil',compact('docente'));
    }

    public function recuperarAnios()
    {
        $id = Auth::user()->id;
        $aniosAcademicos = DB::table('cursos')->join('grados','cursos.id_grado','=','grados.id')
                                              ->where('id_docente',$id)->distinct()
                                              ->orderBy('anio_academico','desc')->get(['anio_academico']);

        return view('docentesmenu.cargarAnios',compact('aniosAcademicos'));
    }

    public function recuperarCursosxAnio(Request $request)
    {
        $id = Auth::user()->id;
        $anio = $request->get('anioacademico');
        $cursos = DB::table('cursos')->join('grados','cursos.id_grado','=','grados.id')
                                     ->join('asignaturas','asignaturas.id','cursos.id_asignatura')
                                     ->where('id_docente',$id)->where('anio_academico',$anio)
                                     ->select('cursos.id','grados.nro','grados.seccion','grados.nivel',
                                     'grados.anio_academico','asignaturas.nombre')->get();
        #echo $cursos;
        return view('docentesmenu.verCursosxAnio',compact('cursos','anio'));

    }

    public function verHorario()
    {
        $id = Auth::user()->id;
        $lastAnio = Grado::max('anio_academico');
        $horarios = DB::table('cursos')->join('salon_horario','salon_horario.id_curso','=','cursos.id')
                                       ->join('grados','grados.id','=','cursos.id_grado')
                                       ->join('asignaturas','asignaturas.id','=','cursos.id_asignatura')
                                       ->where('id_docente',$id)->where('anio_academico',$lastAnio)
                                       #->orderBy('horario')
                                       ->select('horario','nro_salon','nombre','tipo','nro','seccion',
                                       'nivel','anio_academico')->get();

        #public $hoursrange = ['07:00', '09:30', '', '', '', '',];
        #echo $horarios;
        return view('docentesmenu.verHorario', compact('horarios','lastAnio'));

    }

    public function recuperarAniosNotas()
    {
        $id = Auth::user()->id;
        $aniosAcademicos = DB::table('cursos')->join('grados','cursos.id_grado','=','grados.id')
                                              ->where('id_docente',$id)->distinct()
                                              ->orderBy('anio_academico','desc')->get(['anio_academico']);

        return view('docentesmenu.cargarAniosNotas',compact('aniosAcademicos'));
    }

    public function recuperarCursosxAnioNotas(Request $request)
    {
        $id = Auth::user()->id;
        $anio = $request->get('anioacademico');
        $cursos = DB::table('cursos')->join('grados','cursos.id_grado','=','grados.id')
                                     ->join('asignaturas','asignaturas.id','cursos.id_asignatura')
                                     ->where('id_docente',$id)->where('anio_academico',$anio)
                                     ->select('cursos.id','grados.nro','grados.seccion','grados.nivel',
                                     'grados.anio_academico','asignaturas.nombre','cursos.id_grado')->get();
        #echo $cursos;
        return view('docentesmenu.verCursosxAnioNotas',compact('cursos','anio'));

    }

    public function recuperarAlumnosxCurso($id_grado)
    {
        $id = Auth::user()->id;
        $alumnos = DB::table('matriculas')->join('alumnos','alumnos.id','=','matriculas.id_alumno')
                                          ->where('id_grado',$id_grado)
                                          ->select('alumnos.id','alumnos.nombres','alumnos.apellidos')->get();
                                          
        #$alumnos = Matricula::where('id_grado',$id_grado);
        return view('docentesmenu.verAlumnosxCurso',compact('alumnos'));
    }

    public function verCursosActuales()
    {
        $id = Auth::user()->id;
        $lastAnio = Grado::max('anio_academico');
        $cursos = DB::table('cursos')->join('grados','cursos.id_grado','=','grados.id')
                                     ->join('asignaturas','asignaturas.id','cursos.id_asignatura')
                                     ->where('id_docente',$id)->where('anio_academico',$lastAnio)
                                     ->select('cursos.id','grados.nro','grados.seccion','grados.nivel',
                                     'grados.anio_academico','asignaturas.nombre')->get();

        return view('docentesmenu.verCursosNotas',compact('cursos'));
    }

    public function verAlumnosNotas($id_grado)
    {
        $matriculas = Matricula::where('id_grado',$id_grado)->get();
        return view('docentesmenu.verAlumnosNotas',compact('matriculas'));
    }
}
