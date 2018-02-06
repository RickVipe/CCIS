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
    <h3 class="page-header">Grados
    <button type="button" class="btn btn-primary" onClick="location.href='grados/create'">Nuevo</button></h3>
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
            @if($grados->isEmpty())
              <div class="alert alert-success">
                <button type="button" class="close"
                data-dismiss="alert" aria-hidden="true">x</button>
                No se tiene ninguna grado <a href="#" class="alert-link">Ingrese Grados</a>.
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
                      <th>Id Grado</th>
                      <th>Nro de Grado</th>
                      <th>Seccion</th>
                      <th>Nivel</th>
                      <th>Año Academico</th>
                      <th>Vacantes</th>
                      <th>Operaciones</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($grados as $grado)
                    <tr class="odd gradeA" rol="row">
                      <td>{{ $grado->id }}</td>
                      <td>{{ $grado->nro }}</td>
                      <td>{{ $grado->seccion }}</td>
                      <td>{{ $grado->nivel }}</td>
                      <td>{{ $grado->anio_academico }}</td>
                      <td>{{ $grado->vacantes}}</td>

                      <td class="center">
                        <ul class="nav nav-pills">
                          <li>
                            <a href= "{!! action('GradoController@edit' , $grado->id) !!}" title="Editar">
                              <span class="glyphicon glyphicon-pencil"></span>

                            </a>
                          </li>
                          <li>
                            <form method="post" action="{!! action('GradoController@destroy',$grado->id) !!}"
                              onclick="return confirm('Se eliminara este registro, ¿Estas Seguro?');">
                              {!! csrf_field() !!}
                              {!! method_field('DELETE') !!}
                              <div>
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span>
                                </button>
                              </div>
                            </form>
                          <li>
                            <a href= "{!! action('CursoController@show' , $grado->id) !!}" title="Cursos">
                              <span class="glyphicon glyphicon-book"></span>

                            </a>
                          </li>
                          <li>
                            <a href= "{!! action('GradoController@show' , $grado->id) !!}" title="Horario">
                              <span class="glyphicon glyphicon-tasks"></span>

                            </a>
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
