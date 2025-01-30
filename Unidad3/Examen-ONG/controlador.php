<?php
//aqui vamos hacer todas las comprobaciones de los datos que nos llegan del formulario
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
        header('location:index.php');//redirigimos a la pagina principal
    }

}elseif(isset($_POST['cambiarC'])){
    /*si existe la variable cambiarC, tiene que cambiar el centro, 
    utulizaremos session_destroy para destruir la sesion y que pueda cambiarla*/
    
    session_destroy();
    header('location:index.php');
    
}


?>