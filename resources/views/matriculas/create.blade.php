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
        Ingrese los datos del matricula
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <form action="/menucoordinadores/matriculas"  role='form' method="post" autocomplete="off">
            @foreach($errors->all() as $error)
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss='alert' aria-hidden='true'>x</button>
                {{ $error }}
              </div>
            @endforeach

            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
              <label>Alumno</label>
              <input type="text" class="form-control" id = 'id_alumno' name='id_alumno' >

            

              <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          
        </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
            
          <table class="table table-striped table-bordered table-hove" id="dataTables-example">
            
            <thead>
              <tr>
                <th>DNI</th>
                <th>Nombres y Apellidos</th>
              </tr>
            </thead>

            <tbody>
            @foreach($alumnos as $alumno)
              <tr class="odd gradeA" rol="row">
                <td> {{ $alumno -> id }} </td>
                <td> {{ $alumno -> nombres }} {{$alumno -> apellidos }} </td>
                
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      </div>
    </div>

</div>

            </div>
            <div class="form-group">
              <label>Grado</label>
              <select name="id_grado" class="form-control">
                <option value="">Seleccione a algún grado</option>
                @foreach($grados as $grado)
                  <option value="{{$grado->id}}">{{$grado->id}}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="reset" class="btn btn-warning">Limpiar</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/menucoordinadores/matriculas'">Volver</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('js')
<!-- DataTables JS-->
<script src= {{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js')}}></script>
<script src= {{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}></script>

@stop

@section('jsope')
<script>
   var table = document.getElementById('dataTables-example'),rIndex;
   for (var i = 0; i < table.rows.length; i++) {
      table.rows[i].onclick = function()
      {
        rIndex = this.rowIndex;
        document.getElementById('id_alumno').value = this.cells[0].firstChild.data;
      };
   }
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>

@stop
