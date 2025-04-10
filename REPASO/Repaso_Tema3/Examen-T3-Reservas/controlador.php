<?php
require_once 'Modelo.php';

session_start();
$bd=new Modelo();

//ver si se ha pulsado en acceder
if(isset($_POST['acceder'])){

    //tenemos que chequear si el  usuario y la contraseña
    if(empty($_POST['usuario']) || empty($_POST['ps'])){
        $mensaje='Error, no puede estar el usuario ni la contraseña vacia';
    }else{
        //aqui lo que hago es llamar con la variable objeto bd el metodo obtenerUsuario (que seria la rutina$) y guardarla en la variable us
        $us=$bd->obtenerUsuario($_POST['usuario'],$_POST['ps']);

        //ahora lo que vamos hacer es compobar si el usuario existe
        if($us!=null){
           //despues lo que hacemos es guardar en la sesion el usuario una vez que el usuario exista
           $_SESSION['usuario']=$us;//aqui lo qu hacemos es guardar el usuario en la sesion
           header('location:index.php');//aqui lo que hacemos es redirigir a la pagina principal
        }
    }

}


?>