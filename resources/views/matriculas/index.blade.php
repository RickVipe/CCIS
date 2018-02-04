@extends('layouts.layout')


@section('content')

<div class="row">
    <div class="col-lg-12">
    	<h3 class="page-header">Matriculas 
    	<button type="button" class="btn btn-primary" onclick="location.href='matriculas/create '">Nuevo</button></h3>
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
				<div class="dataTable_wrapper">
					@if($matriculas-> isEmpty())
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert"
							aria-hidden="true">x</button>
							No se tiene ningún matricula <a href="#"
							class="alert-link">Ingrese matriculas</a>
						</div>
					@else
						
					<table class="table table-striped table-bordered table-hove" id="dataTables-example">
						<thead>
							<tr>
								<th>ID Matricula</th>
								<th>Alumno</th>
								<th>Grado</th>
								<th>Fecha Matricula</th>
								<th>Operaciones</th>
							</tr>
						</thead>

						<tbody>
						@foreach($matriculas as $matricula)
							<tr class="odd gradeA" rol="row">
								<td> {{ $matricula -> id }} </td>
								<td> {{ $matricula -> Alumno() -> nombres }} {{$matricula -> Alumno() -> apellidos }} </td>
								<td> {{ $matricula -> id_grado }} </td>
								<td> {{ $matricula -> fecha }} </td>
								<td class="center">
									<ul class="nav nav-pills">
									<li>
										<a href="{!! action('MatriculaController@show', $matricula->id ) !!}" title="show">
										<span class="glyphicon glyphicon-search"> </span>
										</a>
									</li>
									<li>
										<a href="{!! action('MatriculaController@edit', $matricula->id ) !!}" title="edit">
										<span class="glyphicon glyphicon-pencil" > </span>
										</a>
									</li>
									<li>
										<form method="post" action="{!! action('MatriculaController@destroy', $matricula->id) !!}"
										onclick="return confirm('Se eliminara este registro, Estas seguro?');">
										{!! csrf_field() !!}
										{!! method_field('DELETE') !!}
										<div> <button type="submit" class="btn btn-danger btn-xs">
										<span class="glyphicon glyphicon-trash"> </span> </button>
										</div>
										</form>
									</li>	
									</ul>									
								</td>
							</tr>
						@endforeach
						</tbody>
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

