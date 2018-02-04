@extends('layouts.layoutD')

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
          Registro de Notas
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4">
              <form role="form" method="post" action="/menudocentes/filtrar/cursos" autocomplete="off">
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <div class="form-group">
                  <label>Seleccione el per&iacute;odo acad&eacute;mico:</label><br>
                  <select name="anioacademico" class="form-control">
                    <option value="">SELECCIONE PERIODO</option>
                    @foreach($aniosAcademicos as $anio)
                    <option value="{!! $anio->anio_academico !!}">periodo {!! $anio->anio_academico !!}</option>
                    @endforeach
                  </select>
                </div>



                <button type="submit" class="btn btn-success">Cargar Cursos</button>
                <button type="button" class="btn btn-danger" onClick="location.href='/menudocentes/docentes'">Volver</button>
              </form>
            </div>

@stop
