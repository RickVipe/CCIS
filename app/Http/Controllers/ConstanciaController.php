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

class ConstanciaController extends Controller
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
        $grados=Grado::All();
        $alumnos=null;
        $grado_actual=null;
        $anios=Grado::select('grados.anio_academico')
        ->distinct()
        ->get();
        return view('constancias.index',compact('grados','alumnos','grado_actual','anios'));
    }

    public function descargar(Request $id_alumno){
      $lista_alumnos = array();
      $lista_notas=array();
      $lista_fechas=array();
      $id=$id_alumno->get('id');
      $consulta=Alumno::join('matriculas','alumnos.id','=','matriculas.id_alumno')
      ->join('grados','grados.id','=','matriculas.id_grado')
      ->where('alumnos.id','=',"$id")
      ->select('alumnos.id','alumnos.nombres','alumnos.apellidos','alumnos.direccion','alumnos.email','grados.nro','grados.seccion','grados.nivel')
      ->get();
      $alumno=$consulta[0];
      $fecha = date('d-m-y');
      $sql = "SELECT `nombre`,`id`,
                GROUP_CONCAT((CASE `trimestre` WHEN 1 THEN `nota` ELSE NULL END)) AS `trimestre1`,
                GROUP_CONCAT((CASE `trimestre` WHEN 2 THEN `nota` ELSE NULL END)) AS `trimestre2`,
                GROUP_CONCAT((CASE `trimestre` WHEN 3 THEN `nota` ELSE NULL END)) AS `trimestre3`
              FROM ( select `notas`.`trimestre`, `asignaturas`.`nombre`, `alumnos`.`nombres`, `alumnos`.`id`,
                     `grados`.`nro`, `grados`.`seccion`, `grados`.`nivel`, `alumnos`.`direccion`, `alumnos`.`email`,
                     `alumnos`.`apellidos`, `notas`.`nota`, `notas`.`observacion`
                      from `alumnos`
                          inner join `matriculas` on `alumnos`.`id` = `matriculas`.`id_alumno`
                          inner join `notas` on `matriculas`.`id` = `notas`.`id_matricula`
                          inner join `cursos` on `cursos`.`id` = `notas`.`id_curso`
                          inner join `asignaturas` on `asignaturas`.`id` = `cursos`.`id_asignatura`
                          inner join `grados` on `grados`.`id` = `matriculas`.`id_grado`
                      where `alumnos`.`id` = $alumno->id
                    ) as `tmp`
              GROUP BY `nombre`,`id`";

      $notas = DB::SELECT($sql);
      array_push($lista_alumnos,$alumno);
      array_push($lista_fechas,$fecha);
      array_push($lista_notas,$notas);
      $view =  \View::make('constancias.invoice')->with('lista_alumnos',$lista_alumnos)->with('lista_fechas',$lista_fechas)->with('lista_notas',$lista_notas)->render();
      //return($view);
      $dompdf = new DOMPDF();
      $dompdf->load_html($view);
      $dompdf->set_base_path('./public/css/style.css');
      $dompdf->render();
      return $dompdf->stream('invoice');

    }

    public function listado(Request $id_grado){

      $id=$id_grado->get('grado');
      $anio=$id_grado->get('anio');

      $grado_actual=$id;
      $alumnos=null;
      if ($id=='*') {
        $alumnos=Grado::join('matriculas','grados.id','=','matriculas.id_grado')
        ->join('alumnos','alumnos.id','=','matriculas.id_alumno')
        ->where('grados.anio_academico','=',$anio)
        ->select('alumnos.id','alumnos.nombres','alumnos.apellidos')
        ->get();
      }else {
        $alumnos=Grado::join('matriculas','grados.id','=','matriculas.id_grado')
        ->join('alumnos','alumnos.id','=','matriculas.id_alumno')
        ->where('grados.id','=',$id)
        ->where('grados.anio_academico','=',$anio)
        ->select('alumnos.id','alumnos.nombres','alumnos.apellidos')
        ->get();
      }

      switch($id_grado->submit_button) {

          case 'listar':
            $grados=Grado::All();
            $anios=Grado::select('grados.anio_academico')
            ->distinct()
            ->get();
            return view('constancias.index',compact('grados','alumnos','grado_actual','anios'));
          break;

          case 'pdf':
            $lista_alumnos = array();
            $lista_notas=array();
            $lista_fechas=array();
            foreach ($alumnos as $alumno ) {
              $id=$alumno->id;
              $consulta=Alumno::join('matriculas','alumnos.id','=','matriculas.id_alumno')
              ->join('grados','grados.id','=','matriculas.id_grado')
              ->where('alumnos.id','=',$id)
              ->select('alumnos.id','alumnos.nombres','alumnos.apellidos','alumnos.direccion','alumnos.email','grados.nro','grados.seccion','grados.nivel')
              ->get();
              $alumno=$consulta[0];
              $fecha = date('d-m-y');
              $sql = "SELECT `nombre`,`id`,
                        GROUP_CONCAT((CASE `trimestre` WHEN 1 THEN `nota` ELSE NULL END)) AS `trimestre1`,
                        GROUP_CONCAT((CASE `trimestre` WHEN 2 THEN `nota` ELSE NULL END)) AS `trimestre2`,
                        GROUP_CONCAT((CASE `trimestre` WHEN 3 THEN `nota` ELSE NULL END)) AS `trimestre3`
                      FROM ( select `notas`.`trimestre`, `asignaturas`.`nombre`, `alumnos`.`nombres`, `alumnos`.`id`,
                             `grados`.`nro`, `grados`.`seccion`, `grados`.`nivel`, `alumnos`.`direccion`, `alumnos`.`email`,
                             `alumnos`.`apellidos`, `notas`.`nota`, `notas`.`observacion`
                              from `alumnos`
                                  inner join `matriculas` on `alumnos`.`id` = `matriculas`.`id_alumno`
                                  inner join `notas` on `matriculas`.`id` = `notas`.`id_matricula`
                                  inner join `cursos` on `cursos`.`id` = `notas`.`id_curso`
                                  inner join `asignaturas` on `asignaturas`.`id` = `cursos`.`id_asignatura`
                                  inner join `grados` on `grados`.`id` = `matriculas`.`id_grado`
                              where `alumnos`.`id` = $alumno->id
                            ) as `tmp`
                      GROUP BY `nombre`,`id`";

              $notas = DB::SELECT($sql);

              array_push($lista_alumnos,$alumno);
              array_push($lista_fechas,$fecha);
              array_push($lista_notas,$notas);
            }

            $view =  \View::make('constancias.invoice')->with('lista_alumnos',$lista_alumnos)->with('lista_fechas',$lista_fechas)->with('lista_notas',$lista_notas)->render();
            //return($view);
            $dompdf = new DOMPDF();
            $dompdf->load_html($view);
            $dompdf->set_base_path('./public/css/style.css');
            $dompdf->render();
            return $dompdf->stream('invoice');
            break;
      }

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
