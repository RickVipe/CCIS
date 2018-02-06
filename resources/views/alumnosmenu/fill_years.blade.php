@extends('layouts.layoutA')

@section('content')

<div class="row">
  <div class="col-lg-12">
  </div>
</div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          Ver mis Cursos
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4">
              <form role="form" method="post" action="/menualumnos/miscursos/lista" autocomplete="off">
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <div class="form-group">
                  <label>Seleccione el Año Acad&eacute;mico:</label><br>
                  <select name="anioacademico" class="form-control">
                    <option value="">SELECCIONE AÑO</option>
                    @foreach($aniosAcademicos as $anio)
                    <option value="{!! $anio->anio_academico !!}">{!! $anio->anio_academico !!}</option>
                    @endforeach
                  </select>
                </div>



                <button type="submit" class="btn btn-primary">Ver Cursos</button>
                <button type="button" class="btn btn-danger" onClick="location.href='/menualumnos/inicio'">Volver</button>
              </form>
            </div>

@stop
