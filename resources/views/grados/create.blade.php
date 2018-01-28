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
          Ingrese los datos del Grado
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="/grados" autocomplete="off">
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <div class="form-group">
                  <label>Nro de Grado</label><br>
                  <select name="nro" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select> <br>
                </div>
                <div class="form-group">
                  <label>Seccion</label><br>
                  <select name="seccion" class="form-control">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                  </select> <br>
                </div>
                <div class="form-group">
                  <label>Nivel</label><br>
                  <select name="nivel" class="form-control">
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>

                  </select> <br>
                </div>

                <div class="form-group">
                  <label>Año Academico</label>
                  <input type="numeric" class="form-control" name="anio_academico" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>

                <div class="form-group">
                  <label>Vacantes</label>
                  <input type="text" class="form-control" name="vacantes" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>




                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
                <button type="button" class="btn btn-danger" onClick="location.href='/grados'">Volver</button>
              </form>
            </div>

@stop
