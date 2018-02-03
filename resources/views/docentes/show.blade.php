@extends('layouts.layout')

@section('content')
<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					Datos del docente
				</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form role='form'>
							
							<div class="form-group">
										<label>DNI</label>
										<input disabled="" type="text" value=" {{$docente -> id}} " class="form-control" name ='dni'>
									</div>
									<div class="form-group">
										<label>Nombres</label>
										<input disabled="" type="text" value=" {{$docente -> nombres}} " class="form-control" name ='nombres'>
									</div>
									<div class="form-group">
										<label>Apellidos</label>
										<input disabled="" type="text" value=" {{$docente -> apellidos}} " class="form-control" name ='apellidos' >
									</div>

									<div class="form-group">
										<label>Especialidad</label>
										<input disabled="" type="text" value=" {{$docente -> especialidad}} " class="form-control"  name ='especialidad'>
									</div>
									
									<div class="form-group">
										<label>Email</label>
										<input disabled="" type="email" value=" {{$docente -> email}} " class="form-control"  name ='email'>
									</div>
									<div class="form-group">
										<label>Telefono</label>
										<input disabled="" type="tel" value=" {{$docente -> telefono}} " class="form-control"  name ='telefono'>
									</div>
										<button type="button" class="btn btn-danger" onClick="location.href='/menucoordinadores/docentes'">Volver</button>
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop