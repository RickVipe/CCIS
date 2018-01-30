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
        $asignatura=new Asignatura;
        $asignatura->nombre=$request->get('nombre');
        //lo siguiente esta mal
        $contador=$asignatura->count()+1;
        $asignatura->id=substr($asignatura->nombre,0,1).$contador;
        $asignatura->save();
        return redirect('/asignaturas')->with('mensaje','Se inserto correctamente!!');
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
        $asignatura->id=$request->get('id');
        $asignatura->nombre=$request->get('nombre');
        $asignatura->save();
        return redirect('/asignaturas')->with('mensaje','Se inserto correctamente!!');
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
        return redirect('asignaturas')->with('mensaje','La Asignatura con id: '.$id.', se elimino correctamente!!');
    }
}
