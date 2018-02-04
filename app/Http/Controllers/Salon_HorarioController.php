<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Grado;
use App\Salon_Horario;
use App\Asignatura;
use App\Curso;

class Salon_HorarioController extends Controller
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
    public function index($id)
    {
        //
       //$salon_horarios = Salon_Horario::where('id','=',$id);
       //return view('salon_horario.index',['salon_horarios'=>$salon_horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$curso=Curso::all()->where('id',$id);
        return view('salon_horario.create');
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
        $salon_horario=new Salon_Horario;
        //$curso->id=$request->get('id_grado').'-'.$request->get('id_asignatura').'-'.$request->get('id_docente');
        $salon_horario->nro_Salon=$request->get('nro_salon');
        $salon_horario->horario=$request->get('horario');
        $salon_horario->tipo=$request->get('tipo');
        $salon_horario->capacidad=$request->get('capacidad');
        $salon_horario->id_curso=$request->get('id_curso');


        $salon_horario->save();
        return redirect('/menucoordinadores/salon_horario')->with('mensaje','Se inserto correctamente!!');
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
        //echo $salon_horarios = Salon_Horario::find($id);
        $salon_horariosaux = Salon_Horario::all();
        $salon_horarios = $salon_horariosaux->where('id_curso',$id);
        $curso=Curso::all()->where('id',$id);
        //echo $salon_horarios = Salon_Horario::where('active', 1)->first();
        //$salon_horariosaux = Salon_Horario::all();
        return view('salon_horario.show',compact('salon_horarios'),['curso'=>$curso]);


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
