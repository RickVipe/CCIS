<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Requests\GradoFormRequest;
use App\Grado;
use App\Salon_Horario;
use App\Asignatura;
use App\Docente;

use DB;

class GradoController extends Controller
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
        $grados=Grado::all();
        return view('grados.index',['grados'=>$grados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('grados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoFormRequest $request)
    {
        //
        if($request->get('nro')!="6" and $request->get('nivel')!="Secundaria")
        {
          $grado=new Grado;
          $grado->nro=$request->get('nro');
          $grado->seccion=$request->get('seccion');
          $grado->nivel=$request->get('nivel');
          $grado->anio_academico=$request->get('anio_academico');
          $grado->id=$grado->nro.'-'.$grado->seccion.'-'.substr($grado->nivel,0,3).'-'.$grado->anio_academico;
          $grado->vacantes=$request->get('vacantes');
          $grado->save();
          return redirect('/menucoordinadores/grados')->with('mensaje','Se inserto correctamente!!');
        }
        else {
          return redirect('/menucoordinadores/grados')->with('mensaje','No se puede insertar 6to de secundaria !!');
        }
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
        $grado=Grado::findOrFail($id);
        $horarios = DB::table('cursos')
            ->join('asignaturas', 'cursos.id_asignatura', '=', 'asignaturas.id')
            ->join('salon_horario', 'cursos.id', '=', 'salon_horario.id_curso')
            ->join('docentes', 'cursos.id_docente', '=', 'docentes.id')
            ->where('cursos.id_grado',$id)
            ->select('salon_horario.horario as horario','asignaturas.nombre as asignatura', 'docentes.nombres as nombre','docentes.apellidos as apellido')
            ->get();

        foreach($horarios as $horarioaux)
        {
          $diahora=explode('-', $horarioaux->horario, 3);
          $diaaux= $salonaux[0];
          $inicialaux= $salonaux[1];
          $finalaux= $salonaux[2];
        }
        //echo $horarios;

        return view('grados.show',compact('grado'),['horarios'=>$horarios]);
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
        $grado=Grado::findOrFail($id);
        return view('grados.edit',compact('grado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradoFormRequest $request, $id)
    {
        //
        $grado = Grado::find($id);
        //$grado->nro=$request->get('nro');
        //$grado->seccion=$request->get('seccion');
        //$grado->nivel=$request->get('nivel');
        //$grado->anio_academico=$request->get('anio_academico');
        $grado->vacantes=$request->get('vacantes');
        $grado->save();
        return redirect('/menucoordinadores/grados')->with('mensaje','Se actualizo correctamente!!');
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
        $grado=Grado::findOrFail($id);
        $grado->delete();
        return redirect('/menucoordinadores/grados')->with('mensaje','El grado con id: '.$id.', se elimino correctamente!!');
    }
}
