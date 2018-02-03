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
          Actualice los datos de la Asignatura
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="/menucoordinadores/asignaturas/{{ $asignatura->id }}" autocomplete="off">

                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                  <label>Id de Asignatura</label>
                  <input type="text" class="form-control" name="id"
                  value="{!! $asignatura->id !!}" disabled
                  style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                  <label>Nombre de Asignatura</label>
                  <input type="text" class="form-control" name="nombres"
                  value="{!! $asignatura->nombre !!}"
                  style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>


                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
                <button type="button" class="btn btn-danger"
                onClick="location.href='/asignaturas'">Volver</button>
              </form>
            </div>

@stop
