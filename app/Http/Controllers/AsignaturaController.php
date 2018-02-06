<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AsignaturaFormRequest;
use App\Asignatura;

class AsignaturaController extends Controller
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
        $asignaturas=Asignatura::all();
        return view('asignaturas.index',['asignaturas'=>$asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturaFormRequest $request)
    {
        //
        $asignaturas= Asignatura::all();
        $numero=0;
        if($asignaturas->count()==0)
        {
          $numero=1;
        }
        else
        {
          $asignaturaaux=$asignaturas->last();
          $numero=substr($asignaturaaux->id,2)+1;
        }
        //$cursoaux=$cursos->last();
        //echo $cursoaux;
        $asignatura=new Asignatura;
        //$curso->id=$request->get('id_grado').'-'.$request->get('id_asignatura').'-'.$request->get('id_docente');
        $asignatura->id="A-".$numero;

        $asignatura->nombre=$request->get('nombre');

        $asignatura->save();
        return redirect('/menucoordinadores/asignaturas')->with('mensaje','Se inserto correctamente!!');
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
        $asignatura=Asignatura::findOrFail($id);
        return view('asignaturas.edit',compact('asignatura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsignaturaFormRequest $request, $id)
    {
        //
        $asignatura = Asignatura::find($id);
        $asignatura->nombre=$request->get('nombre');
        $asignatura->save();
        return redirect('/menucoordinadores/asignaturas')->with('mensaje','Se actualizo correctamente!!');
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
        $asignatura=Asignatura::findOrFail($id);
        $asignatura->delete();
        return redirect('/menucoordinadores/asignaturas')->with('mensaje','La Asignatura con id: '.$id.', se elimino correctamente!!');
    }
}
