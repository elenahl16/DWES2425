<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inicio</title>
</head>
<body>
    <h2>Crud Pilotos</h2>

    @if(session('mensaje'))
        <h3 style="color: red">{{session('mensaje')}}</h3>
    @endif

    <form action="{{route('rP')}}" method="post">
        @csrf

        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre">
        @error('nombre')
            <h3 style="color: red">Debes rellenar el campo nombre</h3>
        @enderror

        <label>Nacionalidad</label>
        <input type="text" name="nacionalidad" id="nacionalidad">
        @error('nacionalidad')
            <h3 style="color: red">Debes rellenar el campo nacionalidad</h3>
        @enderror

        <label>Escuderia</label>
        <input type="text" name="escuderia" id="escuderia">
        @error('escuderia')
            <h3 style="color: red">Debes rellenar el campo escuderia</h3>
        @enderror

        <button type="submit" name="btnCrear" id="btnCrear">Crear Piloto</button>
    </form>
    <br>

    <h2>Pilotos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nacionalidad</th>
                <th>Escuderia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pilotos as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->nacionalidad}}</td>
                    <td>{{$p->escuderia}}</td>
                    <td>
                        <a href="{{route('rModif',$p->id)}}">Modificar</a>

                        <form action="{{route('rE',$p->id)}}" method="post">
                            @method('DELETE')
                            @csrf

                            <button type="submit" name="borrar" id="borrar">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>