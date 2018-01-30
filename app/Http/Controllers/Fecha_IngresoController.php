<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Fecha_IngresoFormRequest;
use App\Fecha_Ingreso;

class Fecha_IngresoController extends Controller
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
        $fecha_ingresos=Fecha_Ingreso::all();
        //return view('fecha_ingreso.index');
        return view('fecha_ingreso.index',['fecha_ingresos'=>$fecha_ingresos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fecha_ingreso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Fecha_IngresoFormRequest $request)
    {
        //
        $fecha_ingreso=new Fecha_Ingreso;
        $fecha_ingreso->anio_academico=$request->get('anio_academico');
        $fecha_ingreso->trimestre=$request->get('trimestre');
        $fecha_ingreso->fecha_inicio=$request->get('fecha_inicio');
        $fecha_ingreso->fecha_fin=$request->get('fecha_fin');
        $fecha_ingreso->id=$fecha_ingreso->anio_academico.'-'.$fecha_ingreso->trimestre;
        $fecha_ingreso->save();
        return redirect('/fecha_ingreso')->with('mensaje','Se inserto correctamente!!');
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
        $fecha_ingreso=Fecha_Ingreso::findOrFail($id);
        return view('fecha_ingreso.edit',compact('fecha_ingreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Fecha_IngresoFormRequest $request, $id)
    {
        //
        $fecha_ingreso = Fecha_Ingreso::find($id);
        $fecha_ingreso->anio_academico=$request->get('anio_academico');
        $fecha_ingreso->trimestre=$request->get('trimestre');
        $fecha_ingreso->fecha_inicio=$request->get('fecha_inicio');
        $fecha_ingreso->fecha_fin=$request->get('fecha_fin');
        $fecha_ingreso->id=$fecha_ingreso->anio_academico.'-'.$fecha_ingreso->trimestre;
        $fecha_ingreso->save();
        return redirect('/fecha_ingreso')->with('mensaje','Se inserto correctamente!!');
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
        $fecha_ingreso=Fecha_Ingreso::findOrFail($id);
        $fecha_ingreso->delete();
        return redirect('fecha_ingreso')->with('mensaje','La fecha de ingreso de notas con id : '.$id.', se elimino correctamente!!');
    }
}
