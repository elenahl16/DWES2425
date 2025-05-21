<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inicio</title>
</head>
<body>
    <h2>Libros</h2>

    @if(session('mensaje'))
        <h2 style="color: red">{{session('mensaje')}}</h2>
    @endif

    <form action="{{route('rL')}}" method="post">
        @csrf

        <label>Titulo</label>
        <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}">
        @error('titulo')
             <h2 style="color: red">Debes rellenar el titulo</h2>
        @enderror

        <br>
        <label>Autor</label>
        <input type="text" name="autor" id="autor" value="{{old('autor')}}">
        <br>

        @error('autor')
             <h2 style="color: red">Debes rellenar el campo autor </h2>
        @enderror

        <label>Num Ejemplares</label>
        <input type="text" name="numEjemplares" id="numEjemplares" value="{{old('numEjemplares')}}">

         @error('numEjemplares')
             <h2 style="color: red">Debes rellenar el numero de Ejemplares</h2>
        @enderror

        <br>
        <label>Fecha</label>
        <input type="date" name="fecha" id="fecha" value="{{old('fecha')}}">
        <br>

        @error('fecha')
             <h2 style="color: red">Debes rellenar la fecha</h2>
        @enderror


        <button type="submit" name="crear" id="crear">Insertar Libro</button>
    </form>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Número de Ejemp</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libro as $l)
                <tr>
                    <td>{{$l->id}}</td>
                    <td>{{$l->titulo}}</td>
                    <td>{{$l->autor}}</td>
                    <td>{{$l->num_ejemplares}}</td>
                    <td>{{$l->fechaPublicacion}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
