<?php
require_once 'Modelo.php';
require_once 'controlador.php';
session_start();
$bd = new Modelo();

//si seleccionamos resultado
if (isset($_POST['resultados'])) {

    //* aqui lo que hago es llamar con la variable objeto bd el metodo obtenerPartido
    //* (que seria la rutina) y guardarla en la variable $partido
    $partido = $bd->obtenerPartido($_POST['partido']);
    $nombreJugador1 = $partido->getJugador1(); //guardamos en la variable el jugador1
    $nombreJugador2 = $partido->getJugador2(); //guardamos en la variable el jugador2

    //guardamos las sesiones
    $_SESSION["partido"]=$partido;// guardamos en partido el codigo
    $_SESSION['jugador1']=$nombreJugador1;
    $_SESSION['jugador2']=$nombreJugador2;
    header('location:resultados.php');
}
