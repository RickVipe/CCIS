@extends('layouts.layout')


@section('content')

<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Coordinadores 
			<button type="button" class="btn btn-primary" onclick="location.href='coordinadores/create '">Nuevo</button></h3>
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
					@if($coordinadores-> isEmpty())
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert"
							aria-hidden="true">x</button>
							No se tiene ningún coordinador <a href="#"
							class="alert-link">Ingrese coordinadores</a>
						</div>
					@else
						
					<table class="table table-striped table-bordered table-hove" id="dataTables-example">
						<thead>
							<tr>
								<th>DNI</th>
								<th>Nombres y Apellidos</th>
								<th>Email</th>
							</tr>
						</thead>

						<tbody>
						@foreach($coordinadores as $coordinador)
							<tr class="odd gradeA" rol="row">
								<td> {{ $coordinador -> id }} </td>
								<td> {{ $coordinador -> nombres }} {{$coordinador -> apellidos }} </td>
								<td> {{ $coordinador -> email }} </td>
								<td class="center">
									<ul class="nav nav-pills">
									<li>
										<a href="{!! action('CoordinadorController@show', $coordinador->id ) !!}" title="show">
										<span class="glyphicon glyphicon-search"> </span>
										</a>
									</li>
									<li>
										<a href="{!! action('CoordinadorController@edit', $coordinador->id ) !!}" title="edit">
										<span class="glyphicon glyphicon-pencil" > </span>
										</a>
									</li>
									<li>
										<form method="post" action="{!! action('CoordinadorController@destroy', $coordinador->id) !!}"
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

