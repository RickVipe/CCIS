@extends('layouts.layout')

@section('estilos')

<!-- DataTables CSS -->

		<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
		<!-- DataTables Responsive CSS -->

		<script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
	@stop

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
						<form action="/menucoordinadores/docentes/{{ $docente -> id  }} " role='form' method='post'>
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
									{{ $error }}
								</div>
							@endforeach
							{{ csrf_field() }}
										{{ method_field('PUT') }}
							<div class="form-group">
										<label>DNI</label>
										<input type="text" value=" {{$docente -> id}} " class="form-control" name ='dni'>
									</div>
									<div class="form-group">
										<label>Nombres</label>
										<input type="text" value=" {{$docente -> nombres}} " class="form-control" name ='nombres' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
									</div>
									<div class="form-group">
										<label>Apellidos</label>
										<input type="text" value=" {{$docente -> apellidos}} " class="form-control" name ='apellidos' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
									</div>
									<div class="form-group">
										<label>Especialidad</label>
										<input type="text" value=" {{$docente -> especialidad}} " class="form-control" name ='especialidad' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
									</div>
									
									<div class="form-group">
										<label>Email</label>
										<input type="email" value=" {{$docente -> email}} " class="form-control" name ='email' style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
									</div>
									<div class="form-group">
										<label>Telefono</label>
										<input type="tel" value=" {{$docente -> telefono}} " class="form-control" name ='telefono' style="text-transform:uppercase;">
									</div>
						<button type="submit" class="btn btn-success">Guardar</button>
										<button type="reset" class="btn btn-warning">Limpiar</button>
										<button type="button" class="btn btn-danger"
										onClick="location.href='/menucoordinadores/docentes'">Volver</button>
							</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop