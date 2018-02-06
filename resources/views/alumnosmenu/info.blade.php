@extends('layouts.layoutA')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">MI INFORMACION</div>

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                          <tr>
                              <th>DNI</th>
                              <th>Nombres y Apellidos</th>
                              <th>Fecha de Nacimiento</th>
                              <th>Direccion</th>
                              <th>Email</th>
                              <th>Apoderado</th>
                              <th>Telefono-Apoderado</th>
                          </tr>
                    </thead>
                    <tbody>


                      <tr class="odd gradeA" rol="row">
                          <td>{{ auth::user()->id }}</td>
                          <td>{{ auth::user()->nombres }} {{ auth::user()->apellidos }}</td>
                          <td>{{ auth::user()->fecha_nacimiento }}</td>
                          <td>{{ auth::user()->direccion }}</td>
                          <td>{{ auth::user()->email }}</td>
                          <td>{{ auth::user()->apoderado }}</td>
                          <td>{{ auth::user()->telefono }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection