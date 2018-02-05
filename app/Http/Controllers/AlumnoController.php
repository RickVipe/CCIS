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
        return view('alumnos.index',['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoFormRequest $request)
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
        return redirect('/menucoordinadores/alumnos')->with('mensaje','Se inserto correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.show',compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit',compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoFormRequest $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->id =$request->input('dni');
        $alumno->nombres =$request->input('nombres');
        $alumno->apellidos =$request->input('apellidos');
        $alumno->fecha_nacimiento =$request->input('fecha_nacimiento');
        $alumno->direccion = $request->input('direccion');
        $alumno->email =$request->input('email');
        $alumno->apoderado =$request->input('apoderado');
        $alumno->telefono =$request->input('telefono');
        $alumno->save();
        return redirect('/menucoordinadores/alumnos')->with('mensaje','Se modificó correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno=Alumno::findOrFail($id);
        $alumno->delete();
        return redirect('/menucoordinadores/alumnos')->with('mensaje','El alumno con id: '.$id.', se elimino correctamente!!');
    }

}
