@extends('layouts.layout')

@section('content')
<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					Datos del coordinador
				</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form role='form'>
							
							<div class="form-group">
										<label>DNI</label>
										<input disabled="" type="text" value=" {{$coordinador -> id}} " class="form-control" name ='dni'>
									</div>
									<div class="form-group">
										<label>Nombres</label>
										<input disabled="" type="text" value=" {{$coordinador -> nombres}} " class="form-control" name ='nombres'>
									</div>
									<div class="form-group">
										<label>Apellidos</label>
										<input disabled="" type="text" value=" {{$coordinador -> apellidos}} " class="form-control" name ='apellidos' >
									</div>
									
									<div class="form-group">
										<label>Email</label>
										<input disabled="" type="email" value=" {{$coordinador -> email}} " class="form-control"  name ='email'>
									</div>
									<button type="button" class="btn btn-danger"
                onClick="location.href='{!! action('CoordinadorController@index2') !!}'">Volver</button>
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop