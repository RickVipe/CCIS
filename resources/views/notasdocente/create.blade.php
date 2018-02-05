@extends('layouts.layoutD')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">{!! $asignatura->nombre !!} - {!! $grado->nro !!}{!! $grado->seccion !!} {!! $grado->nivel !!}
      {!! $grado->anio_academico !!}
    </h3>
  </div>
</div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          Registrar Nota
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="post" action="{!! action('NotaController@registrarNota',[$matricula->id, $curso->id, $alumno->id]) !!}" autocomplete="off">
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> {{ $error }}
                  </div>
                @endforeach
                @if(session('mensaje'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('mensaje') }}
                  </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <div class="form-group">
                  <label>Id Alumno / Apellidos y Nombres</label>
                  <input disabled="" type="text" value="{{$alumno -> id}} / {{$alumno -> apellidos}} {{$alumno -> nombres}} " class="form-control" name ='apellidos' >
                </div>

                <div class="form-group">
                  <label>Trimestre</label><br>
                  <select name="trimestre" class="form-control">
                    <option value="">SELECCIONE EL TRIMESTRE</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Nota</label>
                  <input type="number" class="form-control" name="nota">
                </div>

                <div class="form-group">
                  <label>Observaciones</label>
                  <input type="text" class="form-control" name="observaciones" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" value="sin obserbacion">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-primary">Limpiar</button>
                <button type="button" class="btn btn-danger" onClick="location.href='{!! action('DocenteMenuController@recuperarAlumnosxCurso',[$curso->id_grado, $curso->id_asignatura]) !!}'">Volver</button><br><br>

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th></th>
                      <th>trimestre1</th>
                      <th>trimestre2</th>
                      <th>trimestre3</th>
                      <th>promedio</th>
                      <th>estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>notas</td>
                      <td>{!! $n1 !!}</td>
                      <td>{!! $n2 !!}</td>
                      <td>{!! $n3 !!}</td>
                      <td>{!! $r = round((floatval($n1) + floatval($n2) + floatval($n3))/3.0,3); $r !!}</td>
                      <td>{!! ($r>14)?'aprobado':'desaprobado' !!}</td>
                    </tr>
                  </body>
                </table>
              </form>
            </div>
@stop
