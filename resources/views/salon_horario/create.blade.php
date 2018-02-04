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
          Ingrese el horario del curso
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="/menucoordinadores/salon_horario" autocomplete="off">
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <div class="form-group">
                  <label>Id Curso</label>
                  <input type="text" class="form-control" name="id_curso" value="{{ $curso->first()->id }}" disabled="">
                </div>

                <div class="form-group">
                  <label>Curso</label>
                  <input type="text" class="form-control" value="{{ $curso->first()->Grado->nro }} {{ $curso->first()->Grado->seccion }} {{ $curso->first()->Grado->nivel }} {{ $curso->first()->Grado->anio_academico }}" disabled="">
                </div>



                <div class="form-group">
                <div class="form-group">
                  <label>Nro de Salon</label>
                  <input type="numeric" class="form-control" name="nro_salon" >
                </div>

                <div class="form-group">
                  <label>Dia</label><br>
                  <select name="dia" class="form-control">
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miercoles">Miercoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sabado">Sabado</option>
                  </select> <br>
                </div>

                <div class="form-group">
                  <label>Hora Inicial</label>

                  <input type="time" class="form-control" name="hora_inicial" >

                </div>

                <div class="form-group">
                  <label>Hora Final</label>
                  <input type="time" class="form-control" name="hora_final" >
                </div>

                <div class="form-group">
                  <label>Tipo</label><br>
                  <select name="tipo" class="form-control">
                    <option value="Teoria">Teoria</option>
                    <option value="Labo">Laboratorio</option>
                    <option value="Otros">Otros</option>
                  </select> <br>
                </div>
                <div class="form-group">
                  <label>Capacidad</label>
                  <input type="numeric" class="form-control" name="capacidad" >
                </div>







                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
                <button type="button" class="btn btn-danger" onClick="location.href='/salon_horario'">Volver</button>
              </form>
            </div>

@stop
