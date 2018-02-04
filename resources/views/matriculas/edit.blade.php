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
              <select name="id_alumno" class="form-control">
                @foreach($alumnos as $alumno)
                  @if($alumno->id === $matricula->id_alumno)
                    <option value="{{$alumno->id}}" selected="">{{$alumno->id}} | {{$alumno -> nombres}} {{$alumno -> apellidos}}</option>
                  @else
                    <option value="{{$alumno->id}}">{{$alumno->id}} | {{$alumno -> nombres}} {{$alumno -> apellidos}}</option>
                  @endif
                @endforeach
              </select>
          <table class="table table-striped table-bordered table-hove" id="dataTables-example">
            <thead>
              <tr>
                <th>DNI</th>
                <th>Nombres y Apellidos</th>
                <th>Fecha de nacimiento</th>
                <th>Direccion</th>
                <th>Email</th>
                <th>Apoderado</th>
                <th>Telefono</th>
                <th>Operaciones</th>
              </tr>
            </thead>

            <tbody>
            @foreach($alumnos as $alumno)
              <tr class="odd gradeA" rol="row">
                <td> {{ $alumno -> id }} </td>
                <td> {{ $alumno -> nombres }} {{$alumno -> apellidos }} </td>
                <td> {{ $alumno -> fecha_nacimiento }} </td>
                <td> {{ $alumno -> direccion }} </td>
                <td> {{ $alumno -> email }} </td>
                <td> {{ $alumno -> apoderado }} </td>
                <td> {{ $alumno -> telefono }} </td>
                <td class="center">
                  <ul class="nav nav-pills">
                  <li>
                    <a href="{!! action('AlumnoController@show', $alumno->id ) !!}" title="show">
                    <span class="glyphicon glyphicon-search"> </span>
                    </a>
                  </li>
                  <li>
                    <a href="{!! action('AlumnoController@edit', $alumno->id ) !!}" title="edit">
                    <span class="glyphicon glyphicon-pencil" > </span>
                    </a>
                  </li>
                  <li>
                    <form method="post" action="{!! action('AlumnoController@destroy', $alumno->id) !!}"
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