<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div>
            <!---menu e info us-->
            <ul>
                <li><a href="">Productos</a></li>
                <li><a href="">Pedidos</a></li>
                <li><a href="">Cesta</a></li>
                <li><a href="">{{Auth::user()->name}}</a></li>
                <li><a href="">Salir</a></li>
            </ul>
        </div>

        <div>
            <!---mensajes-->
            @yield('error')
            @yield('info')
        </div>

        <div>
            <!---main-->
            @yield('main')
        </div>

    </div>
</body>
</html>