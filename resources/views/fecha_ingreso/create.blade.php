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
          Ingrese los datos de a Fecha de ingreso de notas
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="/coordinadores/fecha_ingreso" autocomplete="off">
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <div class="form-group">
                  <label>Año Academico</label>
                  <input type="numeric" class="form-control" name="anio_academico" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                  <label>Trimestre</label><br>
                  <select name="trimestre" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select> <br>
                </div>


                <div class="form-group">
                  <label>Fecha Inicial</label>

                  <input type="date" class="form-control" name="fecha_inicio" >

                </div>

                <div class="form-group">
                  <label>Fecha Final</label>
                  <input type="date" class="form-control" name="fecha_fin" >
                </div>




                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
                <button type="button" class="btn btn-danger" onClick="location.href='/fecha_ingreso'">Volver</button>
              </form>
            </div>

@stop
