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
      <input type="text" class="form-control" value=" {{ $curso->first()->Grado->nro }} {{ $curso->first()->Grado->seccion }} {{ $curso->first()->Grado->nivel }} {{ $curso->first()->Grado->anio_academico }}" disabled="">
    </div>
    <div class="form-group">
      <label>Curso</label>
      <input type="text" class="form-control" value=" {{ $curso->first()->Asignatura->nombre }}"  disabled="">
    </div>
    <h3 class="page-header">Horario
    <button type="button" class="btn btn-primary" onClick="location.href='create'">Nuevo</button></h3>
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
            @if($salon_horarios->isEmpty())
              <div class="alert alert-success">
                <button type="button" class="close"
                data-dismiss="alert" aria-hidden="true">x</button>
                No se tiene ninguna horario <a href="#" class="alert-link">Ingrese Horario</a>.
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
                      <th>Nro de Salon</th>
                      <th>Horario</th>
                      <th>Tipo</th>
                      <th>Capacidad</th>

                      <th>Operaciones</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($salon_horarios as $salon_horario)
                    <tr class="odd gradeA" rol="row">
                      <td>{{ $salon_horario->nro_salon }}</td>
                      <td>{{ $salon_horario->horario }}</td>
                      <td>{{ $salon_horario->tipo }}</td>
                      <td>{{ $salon_horario->capacidad }}</td>
                      <td>{{ $salon_horario->id_curso }}</td>

                      <td class="center">
                        <ul class="nav nav-pills">
                          <li>
                            <a href= "{!! action('Salon_HorarioController@edit' , $salon_horario->nro_salon , $salon_horario->horario) !!}" title="Editar">
                              <span class="glyphicon glyphicon-pencil"></span>

                            </a>
                          </li>
                          <li>
                            <form method="post" action="{!! action('Salon_HorarioController@destroy',$salon_horario->nro_salon, $salon_horario->horario ) !!}"
                              onclick="return confirm('Se eliminara este registro, ¿Estas Seguro?');">
                              {!! csrf_field() !!}
                              {!! method_field('DELETE') !!}
                              <div>
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span>
                                </button>
                              </div>
                            </form>

                        </ul>
                      </td>
                    </tr>
                  @endforeach

                  </body>
                </table>
              @endif
            </div>
            <!-- /.table-responsive -->
          </div>
        </div>
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
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

@stop
