<?php
require_once 'Modelo.php';
session_start();
$bd = new Modelo();

//ver si se ha pulsado en acceder
if (isset($_POST['acceder'])) {

    //tenemos que chequear si el usuario y la contraseña
    if (empty($_POST['usuario']) || empty($_POST['ps'])) {
        $mensaje = 'Error, no puede estar el usuario ni la contraseña vacia';
    } else {
        //aqui lo que hago es llamar con la variable objeto bd el metodo obtenerUsuario (que seria la rutina$) y guardarla en la variable us
        $us = $bd->obtenerUsuario($_POST['usuario'], $_POST['ps']);

        //ahora lo que vamos hacer es compobar si el usuario si es distinto de null y si el usuario es activo
        if ($us != null && $us->getActivo()) {
            //despues lo que hacemos es guardar en la sesion el usuario una vez que el usuario exista
            $_SESSION['usuario'] = $us; //aqui lo qu hacemos es guardar el usuario en la sesion
            header('location:index.php'); //aqui lo que hacemos es redirigir a la pagina principal
        } else {
            $mensaje = 'Error, el usuario y la contraseña es incorrecta';
        } 
    }
} elseif (isset($_POST['salir'])) { //si se ha pulsado el boton de salir
    //lo que hacemos es destruir la sesion y redirigir a la pagina principal
    session_destroy();
    setcookie('color','',time()-1);//destruimos la cookie a traves del tiempo
    header('location:index.php');

} elseif (isset($_POST['cambiarColor'])) {
    //aqui lo que hacemos es rellenar el valor de la cockie
    setcookie('color', $_POST['color']);
    header('location:index.php');

} elseif (isset($_POST['verR'])) {
    //aqui lo que hacemos es guardar en la variabla reservas
    $reservas=$bd->obtenerReservas($_POST['recurso']);
}
elseif(isset($_POST['reservar'])){

    if(empty($_POST['fecha']) ||empty($_POST['recurso']) || empty($_POST['hora'])){
        $mensaje='Debe estan rellenos lo campos';
    }else{
       
        if($bd->verificarDisponibilidad($_POST['fecha'],$_POST['recurso'],$_POST['hora'])){
            //Creamos la reserva
            $r=new Reservas(null,$_SESSION['usuario']->getIdRayuela(),$_POST['recurso'],$_POST['fecha'],$_POST['hora'],false);

            if($bd->guardarReserva($r)){
                $mensaje='Reservado correctamente';

                //actualizar el usuario en la sesion
                $_SESSION['usuario']=$bd->infoUsuario($_SESSION['usuario']->getIdRayuela());

            }else{
                $mensaje='Error, no se ha podido reservar';
            }

        }else{
            $mensaje='Error no se puede reservar';
        }
    }


}elseif(isset($_POST['anular'])){

    if(empty($_POST['fecha']) ||empty($_POST['recurso']) || empty($_POST['hora'])){
        $mensaje='Debe estan rellenos lo campos';
    }else{

        if($bd->anularReserva($_SESSION['usuario']->getIdRayuela(),$_POST['recurso'],$_POST['fecha'],$_POST['hora'])){

            $mensaje='Reserva anulada correctamente';

            //actualizar la info del usuario
            $_SESSION['usuario']=$bd->infoUsuario($_SESSION['usuario']->getIdRayuela());
        }else{
            $mensaje='Error no se ha podido anular';
        }

    }

}