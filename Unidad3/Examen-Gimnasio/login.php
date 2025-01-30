<?php
require_once 'Modelo.php';
require_once 'Usuario.php';
require_once 'Cliente.php';

//Primero antes de hacer las validaciones tenenos que comprobar si tenemos conexión con nuestra bd
$bd = new Modelo();

if($bd->getConexion()==null){ //si la conexion es igual a null mensaje de error
    $error='Error, no hay conexión en la bd';

}else{
    //Si tenemos conexión comprobamos que el usuario y la contraseña no esten vacios

    if(isset($_POST['acceder'])){ //i hemos pulsado acceder
        //hacemos las comprobaciones

        if(empty($_POST['usuario']) or  empty($_POST['ps'])){
            $error='Error, no puede estar el usuario ni la contraseña vacios';

        }else{
            //tenemos que comprobar el usuario y la contraseña

        }
    }
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas IES Augustóbriga</title>
</head>
<body>
    <h1>Super Gym</h1>
    <!-- Sección de Login -->
    <section>
        <h2>Login</h2>
        <form action="" method="POST">
            <label for="usuario">Usuario</label><br />
            <input type="text" name="usuario" /><br />
            <label for="ps">Contraseña</label><br />
            <input type="password" name="ps"><br /><br />
            <button type="submit" name="acceder">Acceder</button>
        </form>
    </section>

    <!-- Sección de Mensajes -->
    <section>
        <h3 style="color:red">Mensaje</h3>
    </section>
    </form>
</body>
</html>