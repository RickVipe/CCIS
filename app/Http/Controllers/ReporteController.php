<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use App\Alumno;
use App\Matricula;
use App\Grado;
use App\Curso;
use Dompdf\DOMPDF;

class ReporteController extends Controller
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
        #$fecha_ingresos=Fecha_Ingreso::all();
        //return view('fecha_ingreso.index');
        $grados=Grado::All();
        $alumnos=null;
        $grado_actual=null;
        return view('reportes.index')->with('alumnos', $alumnos)->with('grados',$grados)->with('grado_actual',$grado_actual);
    }

    public function listado(Request $id_grado){

      $id=$id_grado->get('grado');
      $grado_actual=$id;
      $alumnos=null;
      if ($id=='*') {
        $alumnos=Grado::join('matriculas','grados.id','=','matriculas.id_grado')
        ->join('alumnos','alumnos.id','=','id_alumno')->get();
      }else {
        $alumnos=Grado::join('matriculas','grados.id','=','matriculas.id_grado')
        ->join('alumnos','alumnos.id','=','id_alumno')->where('grados.id','=',"$id")->get();
      }

      switch($id_grado->submit_button) {

          case 'listar':
            $grados=Grado::All();
            return view('reportes.index')->with('alumnos',$alumnos)->with('grados',$grados)->with('grado_actual',$grado_actual);
          break;

          case 'pdf':
            $nombre_grado='';
            $grado=null;
            if($id!='*'){
              $grado=Grado::where('grados.id','=',"$id")->select('nro','seccion','nivel','anio_academico')->get();
            }

            $fecha = date('d-m-y');
            $titulo = "Lista de Alumnos ";
            $view =  \View::make('reportes.invoice', compact('alumnos', 'fecha', 'titulo','grado'))->render();

            //return($view);

            $dompdf = new DOMPDF();
            $dompdf->load_html($view);
            $dompdf->set_base_path('./public/css/pdf.css');
            $dompdf->render();
            return $dompdf->stream('invoice');
            break;
      }

    }

    public function constancias(){
      $grados=Grado::All();
      $alumnos=null;
      $grado_actual=null;
      return view('reportes.constancias')->with('alumnos', $alumnos)->with('grados',$grados)->with('grado_actual',$grado_actual);


      $id=$id_grado->get('grado');
      $grado_actual=$id;
      $alumnos=null;
      if ($id=='*') {
        $alumnos=Grado::join('matriculas','grados.id','=','matriculas.id_grado')
        ->join('alumnos','alumnos.id','=','id_alumno')->get();
      }else {
        $alumnos=Grado::join('matriculas','grados.id','=','matriculas.id_grado')
        ->join('alumnos','alumnos.id','=','id_alumno')->where('grados.id','=',"$id")->get();
      }
      echo("ASDasdASD");
      switch($id_grado->submit_button) {

          case 'listar':
            $grados=Grado::All();
            return view('reportes.constancias')->with('alumnos',$alumnos)->with('grados',$grados)->with('grado_actual',$grado_actual);
          break;

          case 'pdf':
            $nombre_grado='';
            $grado=null;
            if($id!='*'){
              $grado=Grado::where('grados.id','=',"$id")->select('nro','seccion','nivel','anio_academico')->get();
            }

            $fecha = date('d-m-y');
            $titulo = "Lista de Alumnos ";
            $view =  \View::make('reportes.invoice2', compact('alumnos', 'fecha', 'titulo','grado'))->render();

            //return($view);

            $dompdf = new DOMPDF();
            $dompdf->load_html($view);
            $dompdf->set_base_path('./public/css/pdf.css');
            $dompdf->render();
            return $dompdf->stream('invoice');
            break;
      }

    }

   public function getData()
   {
       $data =  [
           'quantity'      => '1' ,
           'description'   => 'some ramdom text',
           'price'   => '500',
           'total'     => '500'
       ];
       return $data;
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return redirect('/coordinadores/fecha_ingreso')->with('mensaje','Se inserto correctamente!!');

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
    public function update(Fecha_IngresoFormRequest $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
