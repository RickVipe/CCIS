@extends('layouts.layoutD')

@section('estilos')

  <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}
  ></script>

  <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}
  ></script>

@stop

@section('content')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Mis cursos @if($anio != '') - Per&iacute;odo escolar {!! $anio !!} @endif
    </h3>
  </div>

</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
        <div class="dataTable_wrapper">

          @if($cursos->isEmpty())

            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              No ha seleccionado ningun año <a href="/menudocentes/miscursos" class="alert-link">Seleccionar Año</a>.
            </div>

          @else

            @if(session('mensaje'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session('mensaje') }}
              </div>

            @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead >
                <tr>
                  <th>IdCurso</th>
                  <th>Grado</th>
                  <th>Asignatura</th>

                </tr>
              </thead>
              <tbody>

              @foreach($cursos as $curso)

              <tr class="odd gradeA" rol = "row">
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nro }} {{ $curso->seccion }} {{ $curso->nivel }} {{ $curso->anio_academico }}</td>
                <td>{{ $curso->nombre }}</td>

                
              </tr>

              @endforeach

              </tbody>
            </table>
          @endif
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-danger"
  onclick="location.href='/menudocentes/miscursos'">Volver</button><br><br>
</div>
</div>


@stop

@section('js')

  <script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}>
  </script>

  <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}>
  </script>

@stop

@section('jsope')

  <script>
  $(document).ready(function(){
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
  </script>

@stop
