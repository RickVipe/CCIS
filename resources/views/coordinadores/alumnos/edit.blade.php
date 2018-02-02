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
  				Datos del alumno
  			</div>
  		</div>
  		<div class="panel-body">
  			<div class="row">
  				<div class="col-lg-16">
  					<form action="/coordinadores/alumnos/{{ $alumno -> id  }} " role='form' method='post'>
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
			              <input type="text" value=" {{$alumno -> id}} " class="form-control" placeholder="12345678" name ='dni'>
			            </div>
			            <div class="form-group">
			              <label>Nombre</label>
			              <input type="text" value=" {{$alumno -> nombres}} " class="form-control" name ='nombres' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
			            </div>
			            <div class="form-group">
			              <label>Apellido</label>
			              <input type="text" value=" {{$alumno -> apellidos}} " class="form-control" name ='apellidos' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
			            </div>

			            <div class="form-group">
			              <label>Fecha de nacimiento</label>
			              <input type="date" value=" {{$alumno -> fecha_nacimiento}} " class="form-control"  name ='fecha_nacimiento' style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
			            </div>
			            <div class="form-group">
			              <label>Direccion</label>
			              <input type="text" value=" {{$alumno -> direccion}} " class="form-control" placeholder="Direccion" name ='direccion' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
			            </div>
			            
			            <div class="form-group">
			              <label>Email</label>
			              <input type="email" value=" {{$alumno -> email}} " class="form-control" placeholder="nombre@example.com" name ='email' style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
			            </div>
			            <div class="form-group">
			              <label>Apoderado</label>
			              <input type="text" value=" {{$alumno -> apoderado}} " class="form-control" placeholder="nombre completo del apoderado" name ='apoderado' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
			            </div>
			            <div class="form-group">
			              <label>Telefono</label>
			              <input type="tel" value=" {{$alumno -> telefono}} " class="form-control" placeholder="" name ='telefono' style="text-transform:uppercase;">
			            </div>
						<button type="submit" class="btn btn-success">Guardar</button>
	                	<button type="reset" class="btn btn-warning">Limpiar</button>
	                	<button type="button" class="btn btn-danger"
	                	onClick="location.href='/coordinadores/alumnos'">Volver</button>
	  					</form>

  				</div>
  			@stop