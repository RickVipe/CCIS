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
          Actualice los datos del Grado
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="/coordinadores/grados/{{ $grado->id }}" autocomplete="off">

                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                  <label>Nro de Grado</label>
                  <select name="nro" class="form-control" disabled>
                    <option value="1" @if($grado->nro=="1") selected @endif >1</option>
                    <option value="2" @if($grado->nro=="2") selected @endif >2</option>
                    <option value="3" @if($grado->nro=="3") selected @endif >3</option>
                    <option value="4" @if($grado->nro=="4") selected @endif >4</option>
                    <option value="5" @if($grado->nro=="5") selected @endif >5</option>
                    <option value="6" @if($grado->nro=="6") selected @endif >6</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Seccion</label>
                  <select name="seccion" class="form-control" disabled>

                    <option value="A" @if($grado->seccion=="A") selected @endif >A</option>
                    <option value="B" @if($grado->seccion=="B") selected @endif >B</option>
                    <option value="C" @if($grado->seccion=="C") selected @endif >C</option>
                    <option value="D" @if($grado->seccion=="D") selected @endif >D</option>
                    <option value="E" @if($grado->seccion=="E") selected @endif >E</option>
                    <option value="F" @if($grado->seccion=="F") selected @endif >F</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nivel</label>
                  <select name="nivel" class="form-control" disabled>
                    <option value="Primaria" @if($grado->nivel=="Primaria") selected @endif >Primaria</option>
                    <option value="Secundaria" @if($grado->nivel=="Secundaria") selected @endif >Secundaria</option>

                  </select>
                </div>
                <div class="form-group">
                  <label>Año Academico</label>
                  <input type="numeric" class="form-control" name="anio_academico" disabled
                  value="{!! $grado->anio_academico !!}"
                  style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                  <label>Nro de Vacantes</label>
                  <input type="numeric" class="form-control" name="vacantes"
                  value="{!! $grado->vacantes !!}"
                  style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>


                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
                <button type="button" class="btn btn-danger"
                onClick="location.href='/grados'">Volver</button>
              </form>
            </div>

@stop
