<?php 
require_once "Modelo.php";
session_start();

//Primero tenemos que hacer antes la comprobacion si hay conexion para ver si podemos acceder a la bd
$bd=new Modelo();

if($bd->getConexion()==null){//comprobamos si la conexion es igual a null 
    $mensaje='Error no se puede conectar a la base de datos';

}else{
    //comprobamos que el usuario y contraseña no esten vacios

    if(isset($_POST['acceder'])){

        if(empty($_POST['usuario']) or empty($_POST['ps'])){ //si esta vacio el nombre y la contraseña 
            $mensaje='Error, no puede haber ningun campo vacio';

        }else {
            //si no estan los campos vacios tenemos que hacer login
            
            $usuario=$bd->login($_POST['idRayuela'], $_POST['ps']); //lo que hace es llamar al metodo login donde le vamos a pasar un usuario y una contraseña
            if($usuario!=null){
                if($activo == 0){
                    $mensaje='Error, el usuario no esta activo';

                }else {
                    //si es activo guardamos la sesion
                    $_SESSION['usario']= $usuario;
                    header('location:reserva.php');
                }


            }else{
                $mensaje='Error, el usuario no existe';
            }

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
    <h1>Reservas IES Augustóbriga</h1>
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