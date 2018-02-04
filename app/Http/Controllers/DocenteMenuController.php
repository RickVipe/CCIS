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
                                              ->where('id_docente',$id)->distinct()->get(['anio_academico']);

        return view('docentesmenu.cargarAnios',compact('aniosAcademicos'));
    }

    public function recuperarCursosxAnio(Request $request)
    {
        $id = Auth::user()->id;
        $anio = $request->get('anioacademico');
        $cursos = DB::table('cursos')->join('grados','cursos.id_grado','=','grados.id')
                                     ->join('asignaturas','cursos.id_asignatura','asignaturas.id')
                                     ->where('id_docente',$id)->where('anio_academico',$anio)->get();
        #echo $cursos;
        #$ii = new Curso;
        #$iii = $ii->where('id_docente',$id)->with('Grado','Asignatura')->where('Grado.anio_academico', $anio)->get();
        #echo $iii;
        return view('docentesmenu.verCursosxAnio',compact('cursos','anio'));

    }

    public function verHorario()
    {
        echo 'hola';
    }

    public function verCursosNotas()
    {
        $id = Auth::user()->id;
        $cursos = Curso::where('id_docente',$id)->get();
        return view('docentesmenu.verCursosNotas',compact('cursos'));
    }

    public function verAlumnosNotas($id_grado)
    {
        $matriculas = Matricula::where('id_grado',$id_grado)->get();
        return view('docentesmenu.verAlumnosNotas',compact('matriculas'));
    }
}
