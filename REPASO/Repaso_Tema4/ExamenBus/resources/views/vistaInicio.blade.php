<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Inicio</title>
</head>
<body>
    <h1>Identificacion del Conductor</h1>

    @if (session('mensaje'))
        <h2 style="color: red">{{session('mensaje')}}</h2>
    @endif

    <form action="{{route('rS')}}" method="post">
        @csrf
        
        <label>Conductor</label>
        <input type="text" name="dni" id="dni">

        @error('dni')
         <h2 style="color: red">Debes rellenar el dni del conductor</h2>
        @enderror

        <button type="submit" name="btnServicio" id="btnServicio">Ir a Servicio</button>
    </form>
</body>
</html>
