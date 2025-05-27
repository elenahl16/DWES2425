<?php
require_once 'Modelo.php';
session_start();

$bd = new Modelo();

if (isset($_POST['btnCarrera'])) {

    //*aqui vamos a comprobar con la consulta si existe ese piloto expecifico
    $piloto = $bd->obtenerPiloto($_POST['piloto']);

    //*si el piloto es distinto, es que el piloto existe con ese id, si no mensaje de error
    if ($piloto != null) {

        //si existe guardamos el piloto en la sesión y nos redirigimos a la carrera
        $_SESSION['piloto'] = $piloto;
        header('location:Carrera.php');
    } else {
        $mensaje = 'Error, no existe ningun piloto con ese id';
    }
}
if (isset($_POST['btnCrear'])) {
    //lo que tenemos que insertar(crear vueltas) una vez que seleccionamos el boton crear donde le pasamos
    //al metodo el objeto de session de piloto donde coje el dni y el tiempo es del formulario

    $vueltas = $bd->crearVueltas($_SESSION['piloto']->getId(), $_POST['tiempo']); //aqui nos va a devolver un booleano

    if ($vueltas != true) {

        $mensaje= 'Error, no ha creado ninguna vuelta para ese piloto';
    }
}
//*si seleccionamos el boton cerrar, destruimos la sesion del piloto y redirigimos a la pagina principal
if (isset($_POST['btnCerrar'])) {

    session_destroy();
    header('location:index.php');
}
