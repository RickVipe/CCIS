<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GradoFormRequest;
use App\Grado;

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
        $grado=new Grado;
        $grado->nro=$request->get('nro');
        $grado->seccion=$request->get('seccion');
        $grado->nivel=$request->get('nivel');
        $grado->anio_academico=$request->get('anio_academico');
        $grado->id=$grado->nro.'-'.$grado->seccion.'-'.substr($grado->nivel,0,3).'-'.$grado->anio_academico;
        $grado->vacantes=$request->get('vacantes');
        $grado->save();
        return redirect('/coordinadores/grados')->with('mensaje','Se inserto correctamente!!');
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
        $grado->nro=$request->get('nro');
        $grado->seccion=$request->get('seccion');
        $grado->nivel=$request->get('nivel');
        $grado->anio_academico=$request->get('anio_academico');
        $grado->vacantes=$request->get('vacantes');
        $grado->save();
        return redirect('/coordinadores/grados')->with('mensaje','Se inserto correctamente!!');
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
        return redirect('/coordinadores/grados')->with('mensaje','El grado con id: '.$id.', se elimino correctamente!!');
    }
}
