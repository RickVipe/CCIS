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
          Actualice el horario
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="/menucoordinadores/salon_horario/{{ $id }}" autocomplete="off">

                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                  <label>Id Curso</label>
                  <input type="text" class="form-control" name="id_curso" value="{!! $curso->first()->id !!}" readonly="">
                </div>

                <div class="form-group">
                  <label>Curso</label>
                  <input type="text" class="form-control" value="{{ $curso->first()->Grado->nro }} {{ $curso->first()->Grado->seccion }} {{ $curso->first()->Grado->nivel }} {{ $curso->first()->Grado->anio_academico }}" disabled="">
                </div>

                <?php
                  $horarioaux=explode('-', $salon_horario->horario, 3);
                  $dia=(string) $horarioaux[0];
                  $hora_inicial=(string) $horarioaux[1];
                  $hora_final=(string) $horarioaux[2];
                ?>

                <div class="form-group">
                <div class="form-group">
                  <label>Nro de Salon</label>
                  <input type="numeric" class="form-control" name="nro_salon" value="{!! $salon_horario->nro_salon !!}" readonly="">
                </div>

                <div class="form-group">
                  <label>Dia</label><br>

                  <select name="dia" class="form-control" readonly="">
                    <option value="Lunes" @if($dia=="Lunes") selected @endif>Lunes</option>
                    <option value="Martes"  @if($dia=="Martes") selected @endif>Martes</option>
                    <option value="Miercoles"  @if($dia=="Miercoles") selected @endif>Miercoles</option>
                    <option value="Jueves"  @if($dia=="Jueves") selected @endif>Jueves</option>
                    <option value="Viernes"  @if($dia=="Viernes") selected @endif>Viernes</option>
                    <option value="Sabado"  @if($dia=="Sabado") selected @endif>Sabado</option>
                  </select> <br>
                </div>

                <div class="form-group">
                  <label>Hora Inicial</label>

                  <input type="time" class="form-control" name="hora_inicial" value="{!! $hora_inicial !!}" readonly="">

                </div>

                <div class="form-group">
                  <label>Hora Final</label>
                  <input type="time" class="form-control" name="hora_final" value="{!! $hora_final !!}" readonly="">
                </div>

                <div class="form-group">
                  <label>Tipo</label><br>
                  <select name="tipo" class="form-control">
                    <option value="Teoria" @if($salon_horario->tipo=="Teoria") selected @endif>Teoria</option>
                    <option value="Labo" @if($salon_horario->tipo=="Labo") selected @endif>Laboratorio</option>
                    <option value="Otros" @if($salon_horario->tipo=="Otros") selected @endif>Otros</option>
                  </select> <br>
                </div>
                <div class="form-group">
                  <label>Capacidad</label>
                  <input type="numeric" class="form-control" name="capacidad" value="{!! $salon_horario->capacidad !!}">
                </div>



                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
                <button type="button" class="btn btn-danger"
                onClick="location.href='/menucoordinadores/salon_horario/{!! $curso->first()->id !!}'">Volver</button>
              </form>
            </div>

@stop
