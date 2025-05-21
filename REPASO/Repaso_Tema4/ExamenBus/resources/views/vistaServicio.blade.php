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

    <h3>Conductor:{{$conductor->nombre}}  DNI:{{$conductor->dni}} <a href="{{route('rI')}}">Salir</a></h3>
    <h3>Servicio:{{$servicio->conductor_id}} Fecha:{{$servicio->fecha}}  Recaudación:{{$servicio->recaudacion}}</h3>

    <!--Ene l formulario cuando redirigimos con la ruta este formulario va a ser para verder billetes al servicio
    entonces le tenemos que pasar el id del servicio no del conductor-->
    <form action="{{route('rB',$servicio->id)}}" method="post">
        @csrf

        <label for="">Tipo de Billete</label>
        <select name="tipoBillete" id="tipoBillete">
            <option value="1.5">Normal</option>
            <option value="1">Reducido</option>
        </select>
        <button type="submit" name="registrar">Registrar Billete</button>

    </form>

    <h2>Billetes</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hora</th>
                <th>Precio</th>
                <th>Anulado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--aqui dentro recorremos con un foreach donde ponemos servicio la relacion
                 que tiene servicios a  billetes ya que tiene relacion hasMany solo podemos hacer esto si la relacion es Hasmany-->
            @foreach($servicio->billetes() as $b)
                <tr>
                <td>{{$b->id}}</td>
                <td>{{$b->hora}}</td>
                <td>{{$b->precio}}</td>
                <td>{{$b->anulado}}</td>
                <td>
                    <button type="submit" name="anular" id="anular">Anular</button>
                </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
