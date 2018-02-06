@extends('layouts.layout')

@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="form-group">
      <label>Grado</label>
      <input type="text" class="form-control" value=" {{ $grado->nro }}" disabled="">
    </div>
    <div class="form-group">
      <label>Curso</label>
      <input type="text" class="form-control" value=" {{ $grado->seccion }}"  disabled="">
    </div>
    <div class="form-group">
      <label>Grado</label>
      <input type="text" class="form-control" value=" {{ $grado->nivel }}" disabled="">
    </div>
    <div class="form-group">
      <label>Curso</label>
      <input type="text" class="form-control" value=" {{ $grado->anio_academico }}"  disabled="">
    </div>
    <h3 class="page-header">Horario

    </h3>


  </div>

  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
        </div>


        <!-- /.panel-heading -->
        <div class="panel-body">

          <div class="dataTable_wrapper">
            @if($horarios->isEmpty())
              <div class="alert alert-success">
                <button type="button" class="close"
                data-dismiss="alert" aria-hidden="true">x</button>
                No se tiene el horario de ningun curso  <a href="#" class="alert-link"</a>
              </div>
            @else
              @if(session('mensaje'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session('mensaje') }}
                </div>
              @endif
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                      <th>Hora</th>
                      <th>Lunes</th>
                      <th>Martes</th>
                      <th>Miercoles</th>
                      <th>Jueves</th>
                      <th>Viernes</th>
                      <th>Sabado</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($horarios as $horarioaux)
                    <tr class="odd gradeA" rol="row">
                      <td>{{ $horarioaux->horario }}</td>
                      <td>{{ $horarioaux->asignatura }}</td>
                      <td>{{ $horarioaux->nombre }}</td>
                      <td>{{ $horarioaux->apellido }}</td>
                      <?php
                        //$id=$salon_horario->nro_salon.'_'.$salon_horario->horario.'_'.$curso->first()->id;
                      ?>


                    </tr>
                  @endforeach

                  </body>
                </table>
              @endif
            </div>
            <!-- /.table-responsive -->
          </div>
        </div>
        <button type="button" class="btn btn-danger" onClick="location.href='/menucoordinadores/grados'">Volver</button>
      </div>
    </div>

@stop

@section('js')
<!-- DataTables JavaScript -->
    <script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}></script>


@stop

@section('jsope')

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    

@stop
