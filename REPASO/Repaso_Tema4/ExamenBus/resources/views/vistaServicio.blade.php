<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>servicio</title>
</head>
<body>
    @if(session('mensaje'))
        <h2 style="color: red">{{session('mensaje')}}</h2>
    @endif

    <h1>Conductor:{{$conductor->nombre}}  DNI:{{$conductor->dni}}  <br>
        <a href="{{route('rI')}}">Salir</a>
    </h1>
    <h1>Servicio:    Fecha:     Recaudación:</h1>

    <form action="{{route('rB')}}" method="post">
        @csrf
        <label for="">Tipo de Billete</label>
        <select name="tipoBillete" id="tipoBillete">
            <!--aqui dentro recorremos con un foreach-->

        </select>
        <button type="submit" name="registrar">Registrar Billete</button>

    </form>

</body>
</html>
