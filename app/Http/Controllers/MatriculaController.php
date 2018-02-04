<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Alumno;
use App\Grado;
use Carbon\Carbon;

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
    public function store(Request $request)
    {
        $matricula = new Matricula();
        $matricula->id_alumno = $request->get('id_alumno');
        $matricula->id_grado = $request->get('id_grado');
        $matricula->fecha = Carbon::now();
        $matricula->id = 'MT-'.($matricula->id_alumno).($matricula->fecha->year);
        $auxmatric = Matricula::find($matricula->id);
        if($auxmatric == null){
            $matricula->save();
            return redirect('/menucoordinadores/matriculas')->with('mensaje','Se matriculo correctamente al alumno');
        }
        return redirect('/menucoordinadores/matriculas')->with('mensaje','El alumno ya esta matriculado este año');
        
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
