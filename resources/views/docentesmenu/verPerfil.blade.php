@extends('layouts.layoutD')

@section('content')

<div class="row">
  <div class= "col-lg-12">
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Mis datos
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <form role="form">

              <div class="form-group ">
                <label>Nombres</label>
                <input type="text" class="form-control"
                style="text-transform:uppercase;"
                onkeyup="javascript:this.value=this.value.toUppercase();"
                value="{!! $docente->nombres !!}"
                disabled = "">
              </div>

              <div class="form-group ">
                <label>Apellidos</label>
                <input type="text" class="form-control"
                style="text-transform:uppercase;"
                onkeyup="javascript:this.value=this.value.toUppercase();"
                value="{!! $docente->apellidos !!}"
                disabled = "">
              </div>

              <div class="form-group ">
                <label>Especialidad</label>
                <input type="text" class="form-control"
                style="text-transform:uppercase;"
                onkeyup="javascript:this.value=this.value.toUppercase();"
                value="{!! $docente->especialidad !!}"
                disabled = "">
              </div>

              <div class="form-group ">
                <label>Email</label>
                <input type="email" class="form-control"
                style="text-transform:lowercase;"
                onkeyup="javascript:this.value=this.value.toLowercase();"
                value="{!! $docente->email !!}"
                disabled = "">
              </div>

              <div class="form-group ">
                <label>Telefono</label>
                <input type="tel" class="form-control"
                value="{!! $docente->telefono !!}"
                disabled = "">
              </div>

              <button type="button" class="btn btn-danger"
              onclick="location.href='/menudocentes/docentes'">Volver</button>
            </form>
          </div>

        @stop
