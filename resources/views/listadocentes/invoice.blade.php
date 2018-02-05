<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    <!-- Styles -->
    <style>
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
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
      text-align: center;
      margin: 0 0 20px 0;
      background: url(dimension.png);
    }

    #project {
      float: left;
    }

    #project span {
      color: #5D6975;
      text-align: right;
      width: 70px;
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
      <label for="">
        <div >
          <div class="" style=" padding-right: 2cm">
              <h1>Colegio Inmaculada Concepcion</h1>
          </div>
          @if($grado!=null)
            @foreach($grado as $g)
              <label>{{ $titulo }} - {{$g->nro}}{{$g->seccion}} {{$g->nivel}} {{$g->anio_academico}}</label>
            @endforeach
          @else
            <label for="">Lista de Docentes General</label>
          @endif

            <div class="date">
              <label>Fecha del Reporte: {{ $fecha }}</label>
            </div>
          <br>
        </div>
      </label>
      <br>

      <table border="0" cellspacing="0" cellpadding="0" style=" padding-right: 2cm">
        <thead>
          <tr>
            <th class="no" width="20">NRO</th>
            <th class="desc">Apellidos y Nombres</th>
            <th class="total">Observacion</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=0;?>
          @foreach($docentes as $docente)
          <?php $i=$i+1;?>
            <tr style="padding:5px">
              <td class="no">{{ $i }}</td>
              <td class="desc">{{ $docente['apellidos'] }}-{{ $docente['nombres'] }}</td>
              <td class="total"> </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </body>
</html>
