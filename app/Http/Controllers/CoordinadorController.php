<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\CoordinadorFormRequest;
use App\Coordinador;

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
        return view('coordinadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoordinadorFormRequest $request)
    {
        $coordinador = new Coordinador;
        $coordinador->id =$request->get('dni');
        $coordinador->nombres =$request->get('nombres');
        $coordinador->apellidos =$request->get('apellidos');
        $coordinador->email =$request->get('email');
        $coordinador->password = Hash::make($request->get('password'));
        $coordinador->save();
        return redirect('/menucoordinadores/listado')->with('mensaje','Se inserto correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordinador = Coordinador::findOrFail($id);
        return view('coordinadores.show',compact('coordinador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordinador = Coordinador::findOrFail($id);
        return view('coordinadores.edit',compact('coordinador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoordinadorFormRequest $request, $id)
    {
        $coordinador = Coordinador::findOrFail($id);
        $coordinador->id =$request->input('dni');
        $coordinador->nombres =$request->input('nombres');
        $coordinador->apellidos =$request->input('apellidos');
        $coordinador->email =$request->input('email');
        $coordinador->password = Hash::make($request->input('password'));
        $coordinador->save();
        return redirect('/menucoordinadores/listado')->with('mensaje','Se inserto correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coordinador = Coordinador::findOrFail($id);
        $coordinador->delete();
        return redirect('/menucoordinadores/listado')->with('mensaje','El coordinador con id: '.$id.', se elimino correctamente!!');
    }
    public function index2()
    {
         $coordinadores = Coordinador::all();
        return view('coordinadores.index2',['coordinadores' => $coordinadores]);
    }
}
