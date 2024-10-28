<?php
require_once 'Modelo.php';
//vamos a iniciar la sesio
session_start();

//si no hay sesion iniciada, redirigimos a login
if (!isset($_SESSION['usuario'])) {
    header('location:index.php');
}
if (isset($_POST['cerrar'])) {
    session_destroy();
    header('location:index.php');
}
//creamos objeto de acceso a la bd
$bd = new Modelo();

if (isset($_POST['pCrear']) and $_SESSION['usuario']->getTipo() == 'A') {
    //Tenemos que crear un prestamo, usamos la funcion de la base de datos comprobarSiPrestar(pSocio int,pLibro int);
    //para ver si se puede hacer el prestamo

    $resultado = $bd->comprobar($_POST['socio'], $_POST['libro']);

    if ($resultado == 'ok') {
        //si el resultado es igual a ok, hacemos el prestamo

        $numero = $bd->crearPrestamo($_POST['socio'], $_POST['libro']);

        if ($numero > 0) {
            $mensaje ='Préstamo nº '. $numero . 'registrado';
        } else {
            $error = 'Se ha producido un error al crear el prestamo';
        }
    } else {
        //si no puede hacerlo nos va a mostrar el error porque
        $error = $resultado;
    }
}
if (isset($_POST['pDevolver']) and ($_SESSION['usuario']->getTipo() == 'A')) {

    //Obtener el préstamos
    $p = $bd->obtenerPrestamo($_POST['pDevolver']);

    if ($p!=null) {
        //chequa si hay que sancionar al socio

        $sancion=false;
        if(strtotime($p->getFechaD())<strtotime(date('Y-m-d'))) {
            $sancion = true;
        }

        if($bd->devolverPrestamo($p, $sancion)) {
            $mensaje ='Prestámo devuelto';

            if($sancion) {
                //lo que hacemos con el .=
                $mensaje .= 'Se ha sancionado al socio';
            }
        } else {
            $error = 'Error, al devolver el prestamo';
        }
    } else {
        $error = 'Préstamo no existe';
    }
}
?>
