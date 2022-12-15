<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>ESTOY DANDO INFORMACION DEL MODULO</h2>
    <table>
        <tr>
            <th>Nombre del modulo</th>
            <td>{{ $nombremodulo }}</td>
        </tr>
        <tr>
            <th>Ciclo</th>
            <td>{{ $ciclo }}</td>
        </tr>
    </table>

    @if ($nombremodulo == "dwes")
    <p>Estoy en entorno servidor</p>
    @else
    <p>Estoy en entorno cliente</p>
    @endif

    @foreach($departamentos as $dpto)
    {{$dpto}}
    @endforeach

    
</body>

</html>