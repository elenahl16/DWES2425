<?php

if(isset($_POST['guardar1'])){
    //comprobamos si se han rellenado los datos

    if(empty($_POST['nombre']) or empty($_POST['ape'])){
        //restringimos los datos personales

        //el header lo que hace es cambiar a la pagina que especificamos
        header('location:1datosPers.php');
    }
    else{
        //Creamos y modificamos las cookies
        //el setcookie lo que hace es comprobar si existe esta cooki si existe la modifica y si no la crea
        setcookie('nombre',$_POST['nombre']);
        setcookie('ape',$_POST['ape']);
        header('location:2datosPago.php');
    }
}

else if(isset($_POST['guardar2'])){

    //comprobamos si se han rellenado los datos
    if(empty($_POST['guardar2'])){
        header('location:2datosPago.php');

    }
    else{
        setcookie('tipo',$_POST['tipo']);
        header('location:3mostrarDatos.php');
    }
}
?>