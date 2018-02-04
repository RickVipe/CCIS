@extends('layouts.layout')

@section('content')

<div class="row">
  <div class="col-lg-12">
  </div>
  <!-- /.col-lg-12 -->
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Ingrese los datos del matricula
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <form action="/menucoordinadores/matriculas"  role='form' method="post" autocomplete="off">
            @foreach($errors->all() as $error)
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss='alert' aria-hidden='true'>x</button>
                {{ $error }}
              </div>
            @endforeach

            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
              <label>Alumno</label>
              <select name="id_alumno" class="form-control">
                <option value="">Seleccione a algún alumno</option>
                @foreach($alumnos as $alumno)
                  <option value="{{$alumno->id}}">{{$alumno->id}} | {{$alumno -> nombres}} {{$alumno -> apellidos}}</option>
                @endforeach
              </select>
              
            </div>
            <div class="form-group">
              <label>Grado</label>
              <select name="id_grado" class="form-control">
                <option value="">Seleccione a algún grado</option>
                @foreach($grados as $grado)
                  <option value="{{$grado->id}}">{{$grado->id}}</option>
                @endforeach
              </select>

            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="reset" class="btn btn-warning">Limpiar</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/menucoordinadores/matriculas'">Volver</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop