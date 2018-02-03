@extends('layouts.layout')


@section('content')

<div class="row">
    <div class="col-lg-12">
    	<h3 class="page-header">Docentes 
    	<button type="button" class="btn btn-primary" onclick="location.href='docentes/create '">Nuevo</button></h3>
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
					@if($docentes-> isEmpty())
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert"
							aria-hidden="true">x</button>
							No se tiene ningún docente <a href="#"
							class="alert-link">Ingrese docentes</a>
						</div>
					@else
						
					<table class="table table-striped table-bordered table-hove" id="dataTables-example">
						<thead>
							<tr>
								<th>DNI</th>
								<th>Nombres y Apellidos</th>
								<th>Especialidad</th>
								<th>Email</th>
								<th>Telefono</th>
								<th>Operaciones</th>
							</tr>
						</thead>

						<tbody>
						@foreach($docentes as $docente)
							<tr class="odd gradeA" rol="row">
								<td> {{ $docente -> id }} </td>
								<td> {{ $docente -> nombres }} {{$docente -> apellidos }} </td>
								<td> {{ $docente -> especialidad }} </td>
								<td> {{ $docente -> email }} </td>
								<td> {{ $docente -> telefono }} </td>
								<td class="center">
									<ul class="nav nav-pills">
									<li>
										<a href="{!! action('DocenteController@show', $docente->id ) !!}" title="show">
										<span class="glyphicon glyphicon-search"> </span>
										</a>
									</li>
									<li>
										<a href="{!! action('DocenteController@edit', $docente->id ) !!}" title="edit">
										<span class="glyphicon glyphicon-pencil" > </span>
										</a>
									</li>
									<li>
										<form method="post" action="{!! action('DocenteController@destroy', $docente->id) !!}"
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

