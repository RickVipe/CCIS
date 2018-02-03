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
        Ingrese los datos del Docente
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <form action="/menucoordinadores/docentes"  role='form' method="post" autocomplete="off">
            @foreach($errors->all() as $error)
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss='alert' aria-hidden='true'>x</button>
                {{ $error }}
              </div>
            @endforeach

            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
              <label>DNI</label>
              <input type="text" class="form-control" placeholder="12345678" name ='dni'>
            </div>
            <div class="form-group">
              <label>Nombres</label>
              <input type="text" class="form-control" placeholder="Nombres" name ='nombres' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group">
              <label>Apellidos</label>
              <input type="text" class="form-control" placeholder="Apellidos" name ='apellidos' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group">
              <label>Especialidad</label>
              <input type="text" class="form-control" placeholder="Especialidad" name ='especialidad' style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="nombre@example.com" name ='email' style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name ='password'>
            </div>
            <div class="form-group">
              <label>Telefono</label>
              <input type="tel" class="form-control" placeholder="" name ='telefono' style="text-transform:uppercase;">
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="reset" class="btn btn-warning">Limpiar</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/menucoordinadores/docentes'">Volver</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop