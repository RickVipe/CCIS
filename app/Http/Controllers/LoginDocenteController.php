<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Curso;
use App\Grado;
use App\Asignatura;
use App\Nota;
use App\Matricula;

class LoginDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:docente');
    }

    public function index()
    {
        return view('logindocentes.index');
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
        return view('docentes.verPerfil',compact('docente'));
    }

    public function verCursos()
    {
        $id = Auth::user()->id;
        $cursos = Curso::where('id_docente',$id)->get();
        return view('docentes.verCursos',compact('cursos'));
    }

    public function verHorario()
    {

    }

    public function verCursosNotas()
    {
        $id = Auth::user()->id;
        $cursos = Curso::where('id_docente',$id)->get();
        return view('docentes.verCursosNotas',compact('cursos'));
    }

    public function verAlumnosNotas($id_grado)
    {
        $matriculas = Matricula::where('id_grado',$id_grado)->get();
        return view('docentes.verAlumnosNotas',compact('matriculas'));
    }
    
}
