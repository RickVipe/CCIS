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

class AlumnoMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('auth:alumno');
     }

    public function index()
    {
        return view('alumnosmenu.index');
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
    public function info(){
        return view('alumnosmenu.info');
    }
    public function fill_years(){
        $id = Auth::user()->id;
       
        $aniosAcademicos = DB::table('matriculas')->join('grados','matriculas.id_grado','=','grados.id')
                                              ->where('id_alumno',$id)->distinct()
                                              ->orderBy('anio_academico','desc')->get(['anio_academico']);
        /*$aniosAcademicos = DB::table('cursos')->join('grados','cursos.id_grado','=','grados.id')
                                              ->where('id_docente',$id)->distinct()
                                              ->orderBy('anio_academico','desc')->get(['anio_academico']);*/

        return view('alumnosmenu.fill_years',compact('aniosAcademicos'));
    }
    public function get_courses_by_year(Request $request){
        
        $id = Auth::user()->id;
        $anio = $request->get('anioacademico');
        $cursos = DB::table('matriculas')->join('grados','matriculas.id_grado','=','grados.id')
                                     ->join('cursos','cursos.id_grado','matriculas.id_grado')
                                     ->join('asignaturas','asignaturas.id','cursos.id_asignatura')
                                     ->where('id_alumno',$id)->where('anio_academico',$anio)
                                     ->select('cursos.id','grados.nro','grados.seccion','grados.nivel',
                                     'grados.anio_academico','asignaturas.nombre')->get();
        /*$cursos = DB::table('cursos')->join('grados','cursos.id_grado','=','grados.id')
                                     ->join('asignaturas','asignaturas.id','cursos.id_asignatura')
                                     ->join('asignaturas','asignaturas.id','cursos.id_asignatura')
                                     ->where('id_docente',$id)->where('anio_academico',$anio)
                                     ->select('cursos.id','grados.nro','grados.seccion','grados.nivel',
                                     'grados.anio_academico','asignaturas.nombre')->get();*/

        //return view('docentesmenu.verCursosxAnio',compact('cursos','anio'));
        return view('alumnosmenu.get_courses_by_year', compact('cursos','anio'));
    }

    public function schedule(){
        $id = Auth::user()->id;
        $last_year = Grado::max('anio_academico');
        $horarios = DB::table('matriculas')->join('cursos','cursos.id_grado','=','matriculas.id_grado')
                                       ->join('grados','grados.id','=','matriculas.id_grado')
                                       ->join('asignaturas','asignaturas.id','=','cursos.id_asignatura')
                                       ->join('salon_horario','salon_horario.id_curso','=','cursos.id')
                                       ->where('id_alumno',$id)->where('anio_academico',$last_year) #->orderBy('horario')
                                       ->select('horario','nro_salon','nombre','tipo','nro','seccion',
                                       'nivel','anio_academico')->get();

        return view('alumnosmenu.schedule', compact('horarios','last_year'));
    }
    public function my_teachers(){
        $id = Auth::user()->id;
        $last_year = Grado::max('anio_academico');
        $teachers = DB::table('matriculas')->join('cursos','cursos.id_grado','=','matriculas.id_grado')
                                       ->join('docentes','docentes.id','=','cursos.id_docente')
                                       ->join('grados','grados.id','=','matriculas.id_grado')
                                       ->join('asignaturas','asignaturas.id','=','cursos.id_asignatura')
                                       ->where('id_alumno',$id)->where('anio_academico',$last_year) #->orderBy('horario')
                                       ->select('docentes.nombres as nombres_d', 'docentes.apellidos as apellidos_d', 'nombre')->get();

        return view('alumnosmenu.teachers', compact('teachers','last_year'));
    }
    public function my_classmates(){
        
    }
}
