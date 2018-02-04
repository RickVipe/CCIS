<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Curso;
use App\Grado;
use App\Asignatura;
use App\Docente;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
        $this->middleware('auth:coordinador');
     }
    public function index()
    {
        //
        $cursos=Curso::all();

        return view('cursos.index',['cursos'=>$cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $grados=Grado::all();
        $asignaturas=Asignatura::all();
        $docentes=Docente::all();


        return view('cursos.create',['grados'=>$grados,'asignaturas'=>$asignaturas,'docentes'=>$docentes]);
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
        $cursos= Curso::all();
        $numero=0;
        //echo $cursos->count();
        if($cursos->count()==0)
        {
          $numero=1;
        }
        else
        {
          $cursoaux=$cursos->last();
          $numero=substr($cursoaux->id,2)+1;
        }
        //$cursoaux=$cursos->last();
        //echo $cursoaux;
        $curso=new Curso;
        //$curso->id=$request->get('id_grado').'-'.$request->get('id_asignatura').'-'.$request->get('id_docente');
        $curso->id="C-".$numero;
        $curso->id_grado=$request->get('id_grado');
        $curso->id_asignatura=$request->get('id_asignatura');
        $curso->id_docente=$request->get('id_docente');

        $curso->save();
        return redirect('/menucoordinadores/cursos')->with('mensaje','Se inserto correctamente!!');
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
        $grados=Grado::all();
        $asignaturas=Asignatura::all();
        $docentes=Docente::all();
        $curso=Curso::findOrFail($id);
        return view('cursos.edit',compact('curso'),['grados'=>$grados,'asignaturas'=>$asignaturas,'docentes'=>$docentes]);
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
        $curso = Curso::find($id);
        $curso->id_grado=$request->get('id_grado');
        $curso->id_asignatura=$request->get('id_asignatura');
        $curso->id_docente=$request->get('id_docente');
        $curso->save();
        return redirect('/menucoordinadores/cursos')->with('mensaje','Se actualizo correctamente!!');
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
        $curso=Curso::findOrFail($id);
        $curso->delete();
        return redirect('/menucoordinadores/cursos')->with('mensaje','El curso con id: '.$id.', se elimino correctamente!!');
    }
}
