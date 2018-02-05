<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Constancia</title>

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
      padding: 20px;
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


@foreach($lista_alumnos as $alumno)
  <body>
    <header class="clearfix" style=" padding-right: 2cm">
      <h1>Constancia de Notas</h1>
      <div id="project">
        <div><span>Grado:</span>{{$alumno->nro}}{{$alumno->seccion}} {{$alumno->nivel}}</div>
        <div><span>Alumno:</span>{{$alumno->apellidos}} {{$alumno->nombres}}</div>
        <div><span>DNI:</span>{{$alumno->id}}</div>
        <div><span>Direccion:</span>{{$alumno->direccion}}</div>
        <div><span>Correo:</span>{{$alumno->email}}</div>
        <div><span>Fecha:</span>{{$lista_fechas[0]}}</div>
      </div>
    </header>
    <main>
      <table style=" padding-right: 2cm">
        <thead>
          <tr>
            <th class="service">Nro</th>
            <th class="desc">Curso</th>
            <th>Trimestre 1</th>
            <th>Trimestre 2</th>
            <th>Trimestre 3</th>
            <th>Promedio</th>
            <th>Observacion</th>
          </tr>
        </thead>
        <tbody>

          @foreach($lista_notas as $notas)
            <?php $i=0; ?>
            @foreach($notas as $nota)
              @if($nota->id==$alumno->id)
                <?php $i=$i+1; ?>
                <tr>
                  <td class="service">{{$i}}</td>
                  <td class="desc">{{$nota->nombre}}</td>
                  @if($nota->trimestre=1)
                    <td class="unit">{{$nota->trimestre1}}</td>
                    <td class="qty">{{$nota->trimestre2}}</td>
                    <td class="qty">{{$nota->trimestre3}}</td>
                    <?php
                      $nota1=0;$nota2=0;$nota3=0;
                      if ($nota->trimestre1!=null) {$nota1=$nota->trimestre1;}
                      if ($nota->trimestre2!=null) {$nota2=$nota->trimestre2;}
                      if ($nota->trimestre3!=null) {$nota3=$nota->trimestre3;}
                      $promedio=round(($nota1+$nota2+$nota3)/3,2)
                    ?>
                    <td class="total">{{$promedio}}</td>
                    @if($promedio>=11)
                      <td class="total">Aprobado</td>
                    @else
                      <td class="total">Desaprobado</td>
                    @endif
                  @endif
                </tr>
              @endif
            @endforeach
          @endforeach

        </tbody>
      </table>
    </main>
    <footer>
      Centro Educativo Inmaculada Concepcion
    </footer>
  </body>
 @endforeach



</html>
