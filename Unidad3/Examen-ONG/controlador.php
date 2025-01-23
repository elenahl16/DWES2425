<?php
//aqui vamos hacer todas
require_once "Modelo.php";

session_start();

$bd=new Modelo();
//primero hacemos la conexin a la base de datos
if($bd->getConexion()==null){
    $error="Error al conectar con la base de datos";
}
//si existe la variable seleccionarC
if(isset($_POST['seleccionarC'])) {

    //si hemos seleccionado un centro chequeamos si existe ese centro y este activo 
    $c=$bd->obtenerCentros($_POST['centro']);

    if($c != null and $c->getActivo()){
        //guardamos el centro en la sesión
        $_SESSION['centro']=$c; //lo que hace es guardar el valor de $centro en la sesión.
    }
    
}


?>