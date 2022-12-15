<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
</head>
<body>

@section('widget')
<h3>Aqui iria el widget</h3>
@show


    @section('maincontent')
    <h2>Este es el contenido principal</h2>
    <table>
        <tr><td>Contenido tabla</td></tr>
    </table>
    @show

    <div>
        @yield('secondarycontent')
        <h4>Contenido secundario</h4>
    </div>
</body>
</html>