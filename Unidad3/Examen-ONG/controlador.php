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
    $centro=$bd->obtenerCentro($_POST['centro']);

    if($centro != null and $centro->getActivo()){
        //guardamos el centro en la sesión
        $_SESSION['centro']=$centro; //lo que hace es guardar el objeto centro en la sesion
    }
    
}


?>