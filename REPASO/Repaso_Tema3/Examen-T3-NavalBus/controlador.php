<?php
require_once 'Modelo.php';

//* si pulsamos en iniciarServicio
if(isset($_POST['iniciar'])){

    //comprobamos que el conductor existe
    $conductor=$bd->obtenerConductor($_POST['conductor']);
    
    if($conductor != null){
        

    }
    

}

?>