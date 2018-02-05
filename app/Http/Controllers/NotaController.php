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
use App\Alumno;
use App\Fecha_Ingreso;

class NotaController extends Controller
{

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
        //
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

    public function cargarDatosAlumno($idalumno, $idgrado, $idasignatura)
    {
        $id = Auth::user()->id;
        $alumno = Alumno::where('id',$idalumno)->first(); //solo debe recuperar un alumno
        $matricula = Matricula::where([['id_alumno',$idalumno],['id_grado',$idgrado]])->first(); //igual
        $curso = Curso::where([['id_grado',$idgrado],['id_docente',$id],['id_asignatura',$idasignatura]])->first(); //igual

        return view('notasdocente.create',compact('alumno','matricula','curso'));
    }

    public function registrarNota(Request $request, $idmatricula, $idcurso)
    {
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d');
        
        $
        if()
        $nota = new Nota;
        $nota->id = 'NT-'.$idmatricula.$idcurso;
        $nota->id_matricula = $idmatricula;
        $nota->id_curso = $idcurso;
        $nota->nota = $request->get('nota');
        $nota->trimestre = $request->get('trimestre');
        $nota->observacion = $request->get('observaciones');

        $nota->fecha_ing = date('Ymd'); //H:i:s

        $nota->save();

        echo 'se registro';


        #return view('docentesmenu.verAlumnosxCurso',compact('alumnos','grado','id_asignatura'));
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
}
