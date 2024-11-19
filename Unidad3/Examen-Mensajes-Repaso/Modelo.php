<?php
require_once "Departamento.php";
require_once "Empleado.php";
require_once "Mensaje.php";

class Modelo{

private $conexion=null;
private $servidorBd="localhost";
private $puerto="3306";
private $us="root";
private $ps="";
private $nombreBD="mensajes";

function __construct($conexion,$servidorBd,$puerto,$us,$ps,$nombreBD){

    try {
       
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
    
}

}
?>