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

    public function cargarDatosAlumno($idalumno,$idgrado,$idasignatura)
    {
        $id = Auth::user()->id;
        $alumno = Alumno::where('id',$idalumno)->first(); //solo debe recuperar un alumno
        $matricula = Matricula::where([['id_alumno',$idalumno],['id_grado',$idgrado]])->first(); //igual
        $curso = Curso::where([['id_grado',$idgrado],['id_docente',$id],['id_asignatura',$idasignatura]])->first(); //igual

        return view('notasdocente.create',compact('alumno','matricula','curso'));
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
