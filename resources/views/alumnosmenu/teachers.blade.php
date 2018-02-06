@extends('layouts.layoutA')

@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop

@section('content')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Mis Docentes - Periodo escolar {{ $last_year }}
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
            @if($teachers->isEmpty())
              <div class="alert alert-success">
                <button type="button" class="close"
                data-dismiss="alert" aria-hidden="true">x</button>
                No tiene docentes asignados  <a href="#" class="alert-link"> :v </a>.
              </div>
            @else
              @if(session('mensaje'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session('mensaje') }}
                </div>
              @endif
              <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                <thead>
                  <tr>
                      <th>Docente</th>
                      <th>Asignatura</th>


                  </tr>
                </thead>
                <tbody>
                  @foreach($teachers as $teacher)
                    <tr class="odd gradeA" rol="row">
                      <td>{{ $teacher->nombres_d }} {{ $teacher->apellidos_d }}</td>
                      <td>{{ $teacher->nombre }}</td>
                      
                    </tr>
                  @endforeach
                </body>
              </table>
            @endif
          </div>
          <!-- /.table-responsive -->
        </div>
      </div>
      <button type="button" class="btn btn-danger"
      onclick="location.href='/menualumnos/inicio'">Volver</button><br><br>
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
