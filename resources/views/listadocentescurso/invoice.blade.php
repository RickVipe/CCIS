<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Example 2</title>
    <!-- Styles -->
    <style>
      .clearfix:after {
        content: "";
        display: table;
        clear: both;
      }
      .center {
          margin: auto;
          width: 60%;
      }
      a {
        color: #5D6975;
        text-decoration: underline;
      }

      body {
        position: relative;
        width: 21cm;
        height: 29.7cm;
        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-family: Arial;
      }

      header {
        padding: 10px 0;
        margin-bottom: 30px;
      }

      #logo {
        text-align: center;
        margin-bottom: 10px;
      }

      #logo img {
        width: 90px;
      }

      h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center !important;
        margin: 0 0 20px 0;
      }
      h2 {
        color: #5D6975;
        font-size: 1.8em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
      }
      h3{
        color: #5D6975;
        font-size: 1.2em;
        line-height: 1.4em;
        font-weight: normal;
      }

      #project {
        float: left;
      }

      #project span {
        color: #5D6975;
        text-align: left;
        width: 130px;
        margin-right: 10px;
        display: inline-block;
        font-size: 1.2em;
      }
      .datos{
        color: #1c1c1c;
        text-align: left;
        width: 70px;
        margin-left: 10px;
        display: inline-block;
        font-size: 1em;
      }

      #company {
        float: right;
        text-align: right;
      }

      #project div,
      #company div {
        white-space: nowrap;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
      }

      table tr:nth-child(2n-1) td {
        background: #F5F5F5;
      }

      table th,
      table td {
        text-align: center;
      }

      table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
      }

      table .service,
      table .desc {
        text-align: left;
      }

      table td {
        padding: 5px;
        text-align: right;
      }

      table td.service,
      table td.desc {
        vertical-align: top;
      }

      table td.unit,
      table td.qty,
      table td.total {
        font-size: 1.2em;
      }

      table td.grand {
        border-top: 1px solid #5D6975;;
      }

      #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
      }

      footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
      }

    </style>

  </head>

  <body>
    <header class="clearfix">
      <div>
          <h1><label for="">Colegio Inmaculada Concepcion</label></h1>
          <h2><label for="">{{$titulo}}</label></h2>
      </div>
      <div id="project">
        @if($grado!=null)
          @foreach($grado as $g)
            <div><span>Grado:</span>{{$g->nro}}{{$g->seccion}} {{$g->nivel}}</div>
            <div><span>Periodo Academico:</span>{{$g->anio_academico}}</div>
            <div><span>Fecha del reporte:</span>{{ $fecha }}</div>
          @endforeach
        @else
            <div><span>Lista de docentes general</span></div>
        @endif
      </div>
    </header>
  <main>
    <table border="0" cellspacing="0" cellpadding="0" style=" padding-right: 2cm" class="table table-bordered">
      <thead>
        <tr>
          <th class="no" width="20">NRO</th>
          <th>Asignatura</th>
          <th class="desc">Docente</th>
          <th>Correo</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0;?>
        @foreach($docentes as $docente)
        <?php $i=$i+1;?>
          <tr style="padding:5px">
            <td class="no">{{ $i }}</td>
            <td class="total">{{$docente['nombre']}}</td>
            <td class="desc">{{ $docente['apellidos'] }} {{ $docente['nombres'] }}</td>
            <td class="total">{{$docente['email']}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </main>
  <footer>
    Centro Educativo Inmaculada Concepcion
  </footer>
  </body>
</html>
