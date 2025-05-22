<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Piloto</title>
</head>
<body>
    <h2>Modificar Pilotos</h2>

    @if(session('mensaje'))
        <h3 style="color: red">{{session('mensaje')}}</h3>
    @endif

    <form action="{{route('rM',$piloto->id)}}" method="post">
        @method('PUT')
        @csrf

        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{$piloto->nombre}}" >
        @error('nombre')
            <h3 style="color: red">Debes rellenar el campo nombre</h3>
        @enderror

        <label>Nacionalidad</label>
        <input type="text" name="nacionalidad" id="nacionalidad" value="{{$piloto->nacionalidad}}">
        @error('nacionalidad')
            <h3 style="color: red">Debes rellenar el campo nacionalidad</h3>
        @enderror

        <label>Escuderia</label>
        <input type="text" name="escuderia" id="escuderia" value="{{$piloto->escuderia}}">
        @error('escuderia')
            <h3 style="color: red">Debes rellenar el campo escuderia</h3>
        @enderror



        <button type="submit" name="btnCrear" id="btnCrear">Guardar Piloto</button>

    </form>

</body>
</html>
