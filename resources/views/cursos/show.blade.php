@extends('layouts.layout')

@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop

@section('content')

<div class="row">

  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">

      <div class="form-group">
        <label>Grado</label>
        <input type="text" class="form-control" value="{{ $cursos->first()->Grado->nro }} {{ $cursos->first()->Grado->seccion }} {{ $cursos->first()->Grado->nivel }} {{ $cursos->first()->Grado->anio_academico }} " disabled="">

    </div>
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
                No se tiene ninguna curso <a href="#" class="alert-link">Ingrese Horario</a>.
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
                      <th>Curso</th>
                      <th>Asignatura</th>
                      <th>Docente</th>
                      <th>Operaciones</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($cursos as $curso)
                    <tr class="odd gradeA" rol="row">
                      <td>{{ $curso->id }}</td>

                      <td>{{ $curso->Asignatura->nombre }}</td>
                      <td>{{ $curso->Docente->nombres }} {{ $curso->Docente->apellidos}} </td>
                      <td class="center">
                        <ul class="nav nav-pills">
                          <li>
                            <a href= "{!! action('Salon_HorarioController@show' , $curso->id) !!}" title="Horario">
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
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

@stop
