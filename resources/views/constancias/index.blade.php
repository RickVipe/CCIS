@extends('layouts.layout')
@section('estilos')

@section('content')


<div class="row">
    <div class="col-lg-12">
    	<h3 class="page-header">Constancia de Notas</h3>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
    	<div class="panel panel-primary">
    		<div class="panel-heading">

    		</div>
			<!-- /.panel-heading -->
			<div class="panel-body">

        <div class="">
            <form role="form" class="form" action="/menucoordinadores/constancias/listado" method="post">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <label>Grado</label>
              <label >
                <select class="form-control" id="grado" name="grado">
                  <option value="*" selected>Todos los grados</option>
                  @foreach($grados as $grado)
                    @if($grado_actual==$grado->id)
                      <option value="{{$grado->id}}" selected>{{$grado->nro}}-{{$grado->seccion}} {{$grado->nivel}}</option>
                    @else
                      <option value="{{$grado->id}}">{{$grado->nro}}-{{$grado->seccion}} {{$grado->nivel}}</option>
                    @endif
                  @endforeach
                </select>
              </label>
              <label for="">
                <select class="form-control" name="anio">
                  @foreach($anios as $anio)
                    <option value="{{$anio->anio_academico}}" selected>{{$anio->anio_academico}}</option>
                  @endforeach
                </select>
              </label>
              <button type="submit" class="btn btn-success" value = 'listar' name='submit_button'>Ver Alumnos</button>
              <button type="submit" class="btn btn-primary" value = 'pdf' name='submit_button'>Descargar Todo</button>
            </form>
        </div>

        <div class="">
          <table class="table ">
            <thead>
              <tr>
                <th width='70'>Nro</th>
                <th>Nombres</th>
                <th>Constancia</th>
              </tr>
            </thead>
            <tbody>
              @if($alumnos!=null)
              <?php $i=0;?>
                @foreach($alumnos as $alumno)
                  <?php $i=$i+1;?>
                  <tr class="odd gradeA" rol="row">
                    <td>{{$i}}</td>
                    <td>{{$alumno->apellidos}} {{$alumno->nombres}}</td>
                    <td>
                      <form class="form" role='form' action="/menucoordinadores/constancias/descargar" method="post">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <button type="submit" class="btn btn-primary" value="{{$alumno->id}}" name="id">Descargar Constancia</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
				<!-- /.table-responsive -->
			</div>
    	</div>
    </div>

</div>
@stop
@section('js')
<!-- DataTables JS-->
<script src= {{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js')}}></script>
<script src= {{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}></script>

@stop

@section('jsope')

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });


</script>

@stop
