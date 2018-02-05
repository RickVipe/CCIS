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
    public function index()
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
    public function create($id)
    {
        //echo $id;
        //$curso=Curso::all()->where('id',$id);
        //return view('salon_horario.create');
    }
    public function nuevo($id)
    {
        //echo $id;
        $curso=Curso::all()->where('id',$id);
        return view('salon_horario.create',['curso'=>$curso]);
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
        $hora_inicial=$request->get('hora_inicial');
        $hora_final=$request->get('hora_final');
        $numero_salon=$request->get('nro_salon');
        $dia=$request->get('dia');
        $id=$request->get('id_curso');
        //echo $hora_inicial;
        //echo $hora_final;
        //seleccionar los el numero de salon en la Salon_Horario
        //$salon_horarios = Salon_Horario::where('nro_salon', $request->get('nro_salon') );
        $salon_horarios = Salon_Horario::all();
        $exito=True;
        //echo $salon_horarios->first();
        //@foreach($puos as $puo)



        foreach($salon_horarios as $salon)
        {
          //echo $salon;
          $salonaux=explode('-', $salon->horario, 3);
          $diaaux= $salonaux[0];
          $inicialaux= $salonaux[1];
          $finalaux= $salonaux[2];
          //echo $salon->nro_salon;
          $numerosalonaux=$salon->nro_salon;
          //echo (string)$request->get('nro_salon');
          if($diaaux==$dia and (int)$numerosalonaux==$numero_salon)
          {
            //verificar si las horas se cruzan
            if(($inicialaux<=$hora_inicial and $finalaux>$hora_inicial) or ($hora_inicial<=$inicialaux and $hora_final>$inicialaux))
            {
              $exito=False;
              break;
            }
            if(($finalaux>=$hora_final and $inicialaux<$hora_final) or ($hora_final>=$finalaux and $hora_inicial<$finalaux))
            {
              $exito=False;
              break;
            }

          }

        }
        if($exito and $hora_final>$hora_inicial)
        {

          $salon_horario=new Salon_Horario;
          //$curso->id=$request->get('id_grado').'-'.$request->get('id_asignatura').'-'.$request->get('id_docente');


          $salon_horario->nro_salon=$request->get('nro_salon');
          $salon_horario->horario=$request->get('dia').'-'.$request->get('hora_inicial').'-'.$request->get('hora_final');
          $salon_horario->tipo=$request->get('tipo');
          //$salon_horario->capacidad=$request->get('capacidad');

          if($request->get('capacidad')=="")
          {
              $salon_horario->capacidad="40";
          }
          else{
            $salon_horario->capacidad=$request->get('capacidad');
          }
          /*if ($request->has("id_curso")){
            $salon_horario->capacidad=$request->input('capacidad',40);
          }*/

          //$id=$request->get('id_curso');
          $salon_horario->id_curso=$request->get('id_curso');
          //$salon_horario->id_curso="C-1";


          $salon_horario->save();
          //return redirect('/menucoordinadores/salon_horario/{id}')->with('mensaje','Se inserto correctamente!!');
          return redirect()->action('Salon_HorarioController@show', $id)->with('mensaje','Se inserto correctamente!!');
          //return back();*/
        }
        else
        {
          if( $hora_final<=$hora_inicial)
          {
            return redirect()->action('Salon_HorarioController@show', $id)->with('mensaje','la hora final debe ser mayor a la inicial!!');
          }
          else return redirect()->action('Salon_HorarioController@show', $id)->with('mensaje','hay cruce de horarios, no es posible registrar el horario!!');
        }
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

        //echo $curso;
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

        $parametros=explode('_', $id, 3);
        $nro=(string) $parametros[0];
        $horario=(string) $parametros[1];
        $id_curso=(string) $parametros[2];

        $salon_horario = Salon_Horario::where('nro_salon', $nro )->where('horario', $horario)->first();

        $curso=Curso::all()->where('id',$id_curso);
        return view('salon_horario.edit',['curso'=>$curso,'salon_horario'=>$salon_horario,'id'=>$id]);
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
        $parametros=explode('_', $id, 3);
        echo $nro=(string) $parametros[0];
        echo $horario=(string) $parametros[1];
        echo $curso=(string) $parametros[2];

        $salon_horario = Salon_Horario::where('nro_salon', $nro )->where('horario', $horario)->first();



        //$curso->id=$request->get('id_grado').'-'.$request->get('id_asignatura').'-'.$request->get('id_docente');
        //$salon_horario->nro_salon=$request->get('nro_salon');
        //$salon_horario->horario=$request->get('dia').'-'.$request->get('hora_inicial').'-'.$request->get('hora_final');
        $salon_horario->tipo=$request->get('tipo');
        //$salon_horario->capacidad=$request->get('capacidad');

        if($request->get('capacidad')=="")
        {
            $salon_horario->capacidad="40";
        }
        else{
          $salon_horario->capacidad=$request->get('capacidad');
        }
        $id=$request->get('id_curso');
        $salon_horario->save();

        echo $salon_horario;


        //return redirect('/menucoordinadores/salon_horario/{id}')->with('mensaje','Se inserto correctamente!!');
        return redirect()->action('Salon_HorarioController@show', $curso);
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

        $parametros=explode('_', $id, 3);
        $nro=(string) $parametros[0];
        $horario=(string) $parametros[1];
        $curso=(string) $parametros[2];



        $salon_horario = Salon_Horario::where('nro_salon', $nro )->where('horario', $horario)->delete();

        return redirect()->action('Salon_HorarioController@show', $curso);
        //return back()->with('mensaje','El horario con nro de salon: '.$nro.', y el horario: '.$horario.' se elimino correctamente!!');
    }
}
