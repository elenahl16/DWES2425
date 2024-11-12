<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2: Mantener color</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Color de Fondo</label>
        <input type="color" name="colorFondo" id="colorFondo" value="<?php
        echo (isset($_COOKIE['colorFondo'])? $_COOKIE['colorFondo']: '#FFFFFF');?>"
        /><br></br>

        <label for="">Color de Texto</label>
        <input type="color" name="colorTexto" id="colorTexto" value="<?php
        echo (isset($_COOKIE['colorTexto'])? $_COOKIE['colorTexto']: '#FFFFFF');?>"/><br></br>

        <input type="submit" value="Cambiar colores" name="cambiar"/>
        <input type="submit" value="Resetear colores" name="resetesr"/>
        
    </form>
</body>
</html>

