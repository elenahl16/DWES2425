<?php
require_once 'Modelo.php';
require_once 'Notas.php';
require_once 'Asignaturas.php';
session_start();
$bd=new Modelo();

if(isset($_POST['crearNota'])){
    //comprobamos que los campos no esten vacio

    if(empty($_POST['fecha']) || empty($_POST['descripcion']) || empty($_POST['nota'])){
        $mensaje='Error deben estar todos los campos rellenos';

    }else{
        //si no esta ningun campo vacio creamos la nota 
        $n=$bd->crearNota(new Nota(null,$_POST['asignatura'],$_POST['fecha'],$_POST['descripcion'],$_POST['nota'],false));
    
        
    }

}

?>