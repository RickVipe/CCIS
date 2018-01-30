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
          Actualice la Fecha de ingreso de notas
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="/coordinadores/fecha_ingreso/{{ $fecha_ingreso->id }}" autocomplete="off">

                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                  <label>Año Academico</label>
                  <input type="numeric" class="form-control" name="anio_academico" disabled
                  value="{!! $fecha_ingreso->anio_academico !!}"
                  style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>

                <div class="form-group">
                  <label>Trimestre</label>
                  <select name="trimestre" class="form-control" disabled>
                    <option value="1" @if($fecha_ingreso->trimestre=="1") selected @endif >1</option>
                    <option value="2" @if($fecha_ingreso->trimestre=="2") selected @endif >2</option>
                    <option value="3" @if($fecha_ingreso->trimestre=="3") selected @endif >3</option>

                  </select>
                </div>

                <div class="form-group">
                  <label>Fecha Inicial</label>
                  <input type="date" class="form-control" name="fecha_inicio"
                  value="{!! $fecha_ingreso->fecha_inicio !!}"
                  style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                  <label>Fecha Final</label>
                  <input type="date" class="form-control" name="fecha_fin"
                  value="{!! $fecha_ingreso->fecha_fin !!}"
                  style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>


                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
                <button type="button" class="btn btn-danger"
                onClick="location.href='/fecha_ingreso'">Volver</button>
              </form>
            </div>

@stop
