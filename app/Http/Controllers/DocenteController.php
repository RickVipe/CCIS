<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\DocenteFormRequest;
use App\Docente;
class DocenteController extends Controller
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
        $docentes = Docente::All();
        return view('docentes.index',['docentes' => $docentes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocenteFormRequest $request)
    {
        $docente = new Docente;
        $docente->id =$request->get('dni');
        $docente->nombres =$request->get('nombres');
        $docente->apellidos =$request->get('apellidos');
        $docente->especialidad =$request->get('especialidad');
        $docente->email =$request->get('email');
        $docente->password = Hash::make($request->get('password'));
        $docente->telefono =$request->get('telefono');
        $docente->save();
        return redirect('/menucoordinadores/docentes')->with('mensaje','Se inserto correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = docente::findOrFail($id);
        return view('docentes.show',compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit',compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocenteFormRequest $request, $id)
    {
        $docente = Docente::findOrFail($id);
        $docente->id =$request->input('dni');
        $docente->nombres =$request->input('nombres');
        $docente->apellidos =$request->input('apellidos');
        $docente->especialidad =$request->input('especialidad');
        $docente->email =$request->input('email');
        if ($request->input('password')!== null) {
            $docente->password = Hash::make($request->get('password'));
        }
        $docente->telefono =$request->input('telefono');
        $docente->save();
        return redirect('/menucoordinadores/docentes')->with('mensaje','Se modificó correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id) -> delete();
        return redirect('/menucoordinadores/docentes')->with('mensaje','El docente con id: '.$id.', se elimino correctamente!!');
    }

}
