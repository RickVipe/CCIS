<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\AlumnoFormRequest;
use App\Alumno;

class AlumnoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth:coordinador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $alumnos = Alumno::all();
        return view('coordinadores.alumnos.index',['alumnos' => $alumnos]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordinadores.alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno = new Alumno;
        $alumno->id =$request->get('dni');
        $alumno->nombres =$request->get('nombres');
        $alumno->apellidos =$request->get('apellidos');
        $alumno->fecha_nacimiento =$request->get('fecha_nacimiento');
        $alumno->direccion = $request->get('direccion');
        $alumno->email =$request->get('email');
        $alumno->password = Hash::make($request->get('password'));
        $alumno->apoderado =$request->get('apoderado');
        $alumno->telefono =$request->get('telefono');
        $alumno->save();
        return redirect('/coordinadores/alumnos')->with('mensaje','Se inserto correctamente!');
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

    public function info()
    {
        //$alumno = Alumno::findOrFail($id);
        return view('alumnos.info');
    }

    
}
