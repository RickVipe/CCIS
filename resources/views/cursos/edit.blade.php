@extends('layouts.layout')

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
          Actualice los datos del Cursos
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="/menucoordinadores/cursos/{{ $curso->id }}" autocomplete="off">

                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                  <label>Grado</label>
                  <select name="id_grado" class="form-control">
                    <option value="" select  ></opcion>
                    @foreach($grados as $grado)
                      <option value="{!! $grado->id !!}" @if($grado->id==$curso->id_grado) selected @endif>{{ $grado->nro }} {{ $grado->seccion }} {{ $grado->nivel }} {{ $grado->anio_academico }}</opcion>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Asignatura</label>
                  <select name="id_asignatura" class="form-control">
                    <option value="" select  ></opcion>
                    @foreach($asignaturas as $asignatura)
                      <option value="{!! $asignatura->id !!}" @if($asignatura->id==$curso->id_asignatura) selected @endif>{!! $asignatura->nombre!!}</opcion>

                    @endforeach


                  </select>
                </div>
                <div class="form-group">
                  <label>Docente</label>
                  <select name="id_docente" class="form-control">
                    <option value="" select  ></opcion>

                    @foreach($docentes as $docente)
                      <option value="{!! $docente->id !!}" @if($docente->id==$curso->id_docente) selected @endif>{!!$docente->nombres!!} {!! $docente->apellidos!!}</opcion>

                    @endforeach


                  </select>
                </div>


                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
                <button type="button" class="btn btn-danger"
                onClick="location.href='/menucoordinadores/cursos'">Volver</button>
              </form>
            </div>

@stop
