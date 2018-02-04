@extends('layouts.layoutD')

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
            @if($alumnos->isEmpty())
              <div class="alert alert-success">
                <button type="button" class="close"
                data-dismiss="alert" aria-hidden="true">x</button>
                No se tiene ninguna alumno.
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
                      <th>Id Alumno</th>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>Operaciones</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($alumnos as $alumno)
                    <tr class="odd gradeA" rol="row">
                      <td>{{ $alumno->Alumno->id }}</td>
                      <td>{{ $alumno->Alumno->apellidos }}</td>
                      <td>{{ $curso->Alumno->nombres }}</td>

                      <td class="center">
                        <ul class="nav nav-pills">
                          <li>
                            <a href= "#" title="Editar">
                              <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                          </li>
                          <li>
                            <form method="post" action="#"
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
