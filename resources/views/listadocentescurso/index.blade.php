@extends('layouts.layout')
@section('estilos')

@section('content')


<div class="row">
    <div class="col-lg-12">
    	<h3 class="page-header">Lista de Docentes por Curso</h3>
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
            <form role="form" class="form" action="/menucoordinadores/listadocentescurso/listado" method="post">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <label>Grado</label>
              <label >
                <select class="form-control" id="grado" name="grado" required>
                  <option value="" selected>Escoja un grado</option>
                  @foreach($grados as $grado)
                    @if($grado_actual==$grado->id)
                      <option value="{{$grado->id}}" selected>{{$grado->nro}}-{{$grado->seccion}} {{$grado->nivel}}</option>
                    @else
                      <option value="{{$grado->id}}">{{$grado->nro}}-{{$grado->seccion}} {{$grado->nivel}}</option>
                    @endif
                  @endforeach
                </select>
              </label>
              <button type="submit" class="btn btn-success" value = 'listar' name='submit_button'>Ver Lista</button>
              <button type="submit" class="btn btn-primary" value = 'pdf' name='submit_button'>Descargar PDF</button>
            </form>


        </div>

        <div class="">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th width='70'>Nro</th>
                <th>Docente</th>
                <th>Asignatura</th>
              </tr>
            </thead>
            <tbody>
              @if($docentes!=null)
              <?php $i=0;?>
                @foreach($docentes as $docente)
                  <?php $i=$i+1;?>
                  <tr class="odd gradeA" rol="row">
                    <td>{{$i}}</td>
                    <td>{{$docente->apellidos}} {{$docente->nombres}}</td>
                    <td>{{$docente->nombre}}</td>
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
