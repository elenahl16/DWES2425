<?php
if(isset($_POST['acepta'])){
    setcookie('aceptar',true,time()+(60*60*24*365));
    //el header lo que hace es cambiar a la pagina que especificamos es decir como si la recargarsemos
    header('location:1datosPers.php');
}


//Comprobamos si acepta coockies, si acepto la cookie
if(isset($_COOKIE['acepta']) and $_COOKIE['acepta']){//este if le cerramos al final de la pagina

    $nombre =(isset($_COOKIE['nombre'])?$_COOKIE['nombre']:'');
    $ape=(isset($_COOKIE['ape'])?$_COOKIE['ape']:'');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tratarCookie.php" method="post">
    <div>
     <label for="nombre">Nombre</label>
     <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre?>"/>
    </div>

    <div>
     <label for="ape">Apellidos</label>
     <input type="text" id="ape" name="ape" placeholder="ape" value="<?php echo $ape?>"/>
    </div>
    <input type="submit" value="Guardar y continuar" name="guardar1">
    </form> 
</body>
</html>
<?php

} else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Este sitio trabaja con cookies</h3>
    <form action="tratarCookie.php" method="post">
    <input type="submit" value="Aceptar" name="acepta">
    <input type="submit" value="Rechazar" name="rechaza">
    </form>
</body>
</html>
<?php 

}


?>