<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Alumno;
use App\Grado;
use Carbon\Carbon;
use App\Http\Requests\MatriculaFormRequest;
class MatriculaController extends Controller
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
        $matriculas = Matricula::All();
        return view('matriculas.index',['matriculas'=> $matriculas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::All();
        $grados = Grado::All();
        return view('matriculas.create',['alumnos'=> $alumnos,'grados'=>$grados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculaFormRequest $request)
    {
        $matricula = new Matricula();
        $matricula->id_alumno = $request->get('id_alumno');
        $matricula->id_grado = $request->get('id_grado');
        $anio = Grado::find($request->get('id_grado'))->anio_academico;
        $matricula->fecha = Carbon::now();
        $matricula->id = 'MT-'.($matricula->id_alumno).($anio);
        $auxmatric = Matricula::find($matricula->id);
        if($auxmatric == null){
            $matricula->save();
            return redirect('/menucoordinadores/matriculas')->with('mensaje','Se matriculo correctamente al alumno');
        }
        return redirect('/menucoordinadores/matriculas')->with('error','El alumno ya esta matriculado este año');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matriculas = Matricula::where('id_grado','=',$id)->get();
        return view('matriculas.matxgrado',['matriculas'=>$matriculas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grados = Grado::All();
        $matricula = Matricula::findOrFail($id);
        $elpro = Alumno::findOrFail($matricula->id_alumno);
        return view('matriculas.edit',['matricula'=>$matricula, 'grados'=>$grados,'elpro'=>$elpro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatriculaFormRequest $request, $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->id_alumno = $request->input('id_alumno');
        $matricula->id_grado = $request->input('id_grado');
        $matricula->save();
        return redirect('/menucoordinadores/matriculas')->with('mensaje','Se modificaron correctamente los datos');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula = matricula::findOrFail($id) -> delete();
        return redirect('/menucoordinadores/matriculas')->with('mensaje','El matricula con id: '.$id.', se elimino correctamente!!');
    }
}
