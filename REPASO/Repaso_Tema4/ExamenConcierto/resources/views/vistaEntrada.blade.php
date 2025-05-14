<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Entrada</title>
</head>
<body>
    @if (session('mensaje'))
        <h2 style="color: red">{{session('mensaje')}}</h2>
    @endif

    <form action="{{route('rB',$concierto->id)}}" method="post">
        @method('Delete')


        @csrf
        <h2>
            Concierto:{{$concierto->titulo}}
            <button type="submit" name="borrar" id="borrar">Borrar</button>
        </h2>
        <h2>Aforo:{{$concierto->aforo}}</h2>
        <h2>PrecioEntrada:{{$concierto->precioEntrada}}</h2>
        <h2> <a href="{{route('rI')}}">Inicio </a> </h2>
    </form>


    <form action="{{route('rV',$concierto->id)}}" method="post">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{old('email')}}"/> <!-- con el old lo que hace es recordar los datos-->

        <!-- Una vez que hacemos las validacicones mostramos el mensaje de error en la vista-->
        @error('email')
            <h2 style="color: red">Debes rellenar el campo email</h2>
        @enderror

        <label for="numEntradas">Nº de Entradas</label>
        <input type="number" name="numEntradas" id="numEntradas"/>

        @error('numEntradas')
            <h2 style="color: red">Debes rellenar el campo numEntradas con un valor entre 1 y 4</h2>
        @enderror

        <button type="submit" name="registrarV" id="registrarV">Registrar Venta</button>
    </form>

    <!-- aqui vamos a pintar una tabla para las entradas-->
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Fecha</td>
            <td>Email</td>
            <td>Aforo</td>
        </tr>
    @foreach ($concierto->entradas() as $e)
        <tr>
            <td>{{$e->id}}</td>
            <td>{{$e->created_at}}</td>
            <td>{{$e->email}}</td>
            <td>{{$e->numEntradas}}</td>
        </tr>

    @endforeach
    </table>
</body>
</html>