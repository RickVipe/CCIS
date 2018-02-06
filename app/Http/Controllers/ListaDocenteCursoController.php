<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use App\Alumno;
use App\Docente;
use App\Matricula;
use App\Grado;
use App\Curso;
use Dompdf\Dompdf;

class ListaDocenteCursoController extends Controller
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
        $docentes=null;
        $grado_actual=null;
        return view('listadocentescurso.index')->with('docentes', $docentes)->with('grados',$grados)->with('grado_actual',$grado_actual);
    }

    public function listado(Request $id_grado){

      $id=$id_grado->get('grado');
      $grado_actual=$id;
      $docentes=null;
      if ($id!='') {
        $docentes=Docente::join('cursos','docentes.id','=','cursos.id_docente')
        ->join('asignaturas','asignaturas.id','=','cursos.id_asignatura')
        ->join('grados','grados.id','=','cursos.id_grado')
        ->select('docentes.nombres','docentes.apellidos','docentes.id','asignaturas.nombre','docentes.email')
        ->groupBy('docentes.id','docentes.apellidos','docentes.nombres','asignaturas.nombre','docentes.email')
        ->where('grados.id','=',"$id")
        ->get();
      }

      switch($id_grado->submit_button) {

          case 'listar':
            $grados=Grado::All();
            return view('listadocentescurso.index')->with('docentes',$docentes)->with('grados',$grados)->with('grado_actual',$grado_actual);
          break;

          case 'pdf':
            $nombre_grado='';
            $grado=null;
            if($id!='*'){
              $grado=Grado::where('grados.id','=',"$id")->select('nro','seccion','nivel','anio_academico')->get();
            }

            $fecha = date('d-m-y');
            $titulo = "Lista de Docentes ";
            $view =  \View::make('listadocentescurso.invoice', compact('docentes', 'fecha', 'titulo','grado'))->render();

            //return($view);

            $dompdf = new Dompdf();
            $dompdf->load_html($view);
            $dompdf->set_base_path('./public/css/pdf.css');
            $dompdf->render();
            return $dompdf->stream('invoice');
            break;
      }

    }

    public function constancias(){
      $grados=Grado::All();
      $docentes=null;
      $grado_actual=null;
      return view('listadocentes.constancias')->with('docentes', $docentes)->with('grados',$grados)->with('grado_actual',$grado_actual);


      $id=$id_grado->get('grado');
      $grado_actual=$id;
      $docentes=null;
      if ($id=='*') {
        $docentes=Grado::join('matriculas','grados.id','=','matriculas.id_grado')
        ->join('docentes','docntes.id','=','id_docente')
        ->select('docentes.nombres','docentes.apellidos')
        ->groupBy('docentes.id')
        ->get();
      }else {
        $docentes=Grado::join('matriculas','grados.id','=','matriculas.id_grado')
        ->join('docentes','docentes.id','=','id_docente')->where('grados.id','=',"$id")->get();
      }
      echo("ASDasdASD");
      switch($id_grado->submit_button) {

          case 'listar':
            $grados=Grado::All();
            return view('listadocentes.constancias')->with('docentes',$docentes)->with('grados',$grados)->with('grado_actual',$grado_actual);
          break;

          case 'pdf':
            $nombre_grado='';
            $grado=null;
            if($id!='*'){
              $grado=Grado::where('grados.id','=',"$id")->select('nro','seccion','nivel','anio_academico')->get();
            }

            $fecha = date('d-m-y');
            $titulo = "Lista de Alumnos ";
            $view =  \View::make('listadocentes.invoice2', compact('docentes', 'fecha', 'titulo','grado'))->render();

            //return($view);

            $dompdf = new Dompdf();
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
