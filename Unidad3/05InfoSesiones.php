<?php
//Siempre que trabajemos con sesiones tenemos que poner el ssesion_star
//Mostramos el array $_SESSION
echo '<h4>Valor de $_SESSION antes de hacer el session_start';
echo var_dump($_SESSION);


//Antes de trabajar con sesion hay que llamar a session_star()
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo 'Id Sesión:'.session_id();
        echo '<br>Nombre Sesión:'.session_name();
        //creamos una variable en la sesion

        $_SESSION['nombre']='Elena';
    ?>
</body>
</html>