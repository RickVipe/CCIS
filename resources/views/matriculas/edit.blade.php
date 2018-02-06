@extends('layouts.layout')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					Datos del matricula
				</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form action="/menucoordinadores/matriculas/{{ $matricula -> id  }} " role='form' method='post'>
							@foreach($errors->all() as $error)
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							{{ $error }}
							</div>
							@endforeach
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<div class="form-group">
              <label>Alumno</label>
              <input type="text" class="form-control" name='id_alumno' value='{{$elpro->id}}'>

            </div>
            <div class="form-group">
              <label>Grado</label>
              <select name="id_grado" class="form-control">
                <option value="">Seleccione a algún grado</option>
                @foreach($grados as $grado)
                  @if($grado->id === $matricula->id_grado)
                    <option value="{{$grado->id}}" selected="">{{$grado->id}}</option>
                  @else
                    <option value="{{$grado->id}}">{{$grado->id}}</option>
                  @endif
                  
                @endforeach
              </select>
            </div>
										<button type="submit" class="btn btn-success">Guardar</button>
										<button type="reset" class="btn btn-warning">Limpiar</button>
										<button type="button" class="btn btn-danger"
										onClick="location.href='/menucoordinadores/matriculas'">Volver</button>
							</form>
          </div>
        </div>
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

