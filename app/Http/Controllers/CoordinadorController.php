<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\AlumnoFormRequest;
use App\Alumno;
class CoordinadorController extends Controller
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
        return view('coordinadores.index');
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

    public function alumnoindex()
    {
        $alumnos = Alumno::all();
        return view('coordinadores.alumnos.index',['alumnos' => $alumnos]); 
    }

    public function alumnocreate()
    {
        return view('coordinadores.alumnos.create');
    }

    public function alumnostore($id)
    {
        $alumno = new Alumno;
        $alumno->id =$request->get('dni');
        $alumno->nombres =$request->get('nombres');
        $alumno->apellidos =$request->get('apellidos');
        $alumno->fecha_nacimiento =$request->get('fecha_nacimiento');
        $alumno->direccion = $request->get('direccion');
        $alumno->email =$request->get('email');
        $alumno->password = $request->get('password');
        $alumno->apoderado =$request->get('apoderado');
        $alumno->telefono =$request->get('telefono');
        $alumno->save();
        return redirect('coordinadores/alumnos/index')->with('mensaje','Se inserto correctamente!');
    }
}
