<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
</head>
<body>
    <form action="{{route('registrar')}}" method="post">
        @csrf
        Nombre
        <input type="text" name="nombre" value="{{old('nombre')}}"/>
        Email
        <input type="email" name="email" value="{{old('email')}}"/>
        Contraseña
        <input type="password" name="ps"/>
        Confirmar Contraseña
        <input type="password" name="ps2"/>

        <button type="submit" name="crearUsuario">CrearU</button>
        <a href="{{route('vistaLogin')}}">Volver</a>
    </form> 
</body>
</html>