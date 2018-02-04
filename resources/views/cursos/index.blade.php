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
    <h3 class="page-header">Cursos
    <button type="button" class="btn btn-primary" onClick="location.href='cursos/create'">Nuevo</button></h3>
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
            @if($cursos->isEmpty())
              <div class="alert alert-success">
                <button type="button" class="close"
                data-dismiss="alert" aria-hidden="true">x</button>
                No se tiene ninguna curso <a href="#" class="alert-link">Ingrese Cursos</a>.
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
                      <th>Id Curso</th>
                      <th>Grado</th>
                      <th>Asignatura</th>
                      <th>Docente</th>

                      <th>Operaciones</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($cursos as $curso)
                    <tr class="odd gradeA" rol="row">
                      <td>{{ $curso->id }}</td>

                      <td>{{ $curso->Grado->nro }} {{ $curso->Grado->seccion }} {{ $curso->Grado->nivel }} {{ $curso->Grado->anio_academico }}</td>
                      <td>{{ $curso->Asignatura->nombre }}</td>
                      <td>{{ $curso->Docente->nombres }} {{ $curso->Docente->apellidos}}</td>

                      <td class="center">
                        <ul class="nav nav-pills">
                          <li>
                            <a href= "{!! action('CursoController@edit' , $curso->id) !!}" title="Editar">
                              <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                          </li>
                          <li>
                            <form method="post" action="{!! action('CursoController@destroy',$curso->id) !!}"
                              onclick="return confirm('Se eliminara este registro, ¿Estas Seguro?');">
                              {!! csrf_field() !!}
                              {!! method_field('DELETE') !!}
                              <div>
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span>
                                </button>
                              </div>
                            </form>
                          </li>
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
