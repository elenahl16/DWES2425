<?php
require_once 'Modelo.php';
// Iniciamos la sesión para poder guardar y recuperar datos entre páginas
session_start();
// Creamos un nuevo objeto bd de la clase Modelo para poder obtener los metodos
$bd = new Modelo();

//* si pulsamos en iniciarServicio
if (isset($_POST['iniciar'])) {

    //aqui lo que hago es llamar con la variable objeto bd el metodo obtenerConductor (que seria la rutina) y guardarla en la variable $conductor
    $c = $bd->obtenerConductor($_POST['conductor']);

    //comprobamos que el conductor existe y la linea tambien
    if ($c != null) {
        $l = $bd->obtenerLinea($_POST['linea']);

        //* y también comprobamos de que si existe tanto la linea como el conductor que cree un servicio
        if ($l != null) {
            if ($bd->crearServicio($c, $l)) {
                //*Si existe el conductor y la linea, creamos el serviciou 
                //* lo que tenemos que hacer es guardar la sesion tanto del conductor como de la linea
                $_SESSION['conductor'] = $c; //*aqui lo qu hacemos es guardar el usuario en la sesion
                $_SESSION['linea'] = $l;
                header("location:index.php");
            }
        } else {
            $mensaje = "Error no existe esa linea";
        }
    } else {
        $mensaje = "Error no existe ese conductor";
    }

}elseif(isset($_POST['vender'])){ //Si pulsamos al boton vender

    //tenemos que comprobar cuanto vale el billete para poder venderle
    $precioB=$bd->obtenerPrecio($_POST['tipo']);

    //una vez que sabemos el precio, vendemos el billete
    if($bd->venderBilletes($_SESSION['conductor'],$_SESSION['linea'],$_POST['tipo'],$precioB)){
        $mensaje="El billete ha sido vendido";

    }else{
        $mensaje="Error, no se ha podido vender el billete";
    }
}


