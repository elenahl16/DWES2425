<?php
require_once 'Entrada.php';

class Modelo
{

    private $nombreFichero = 'entrada.txt';


    function __construct() {

    }

    function guardarEntrada($e){

        $resultado = false;

        $f = fopen($this->nombreFichero, 'a+');

        if($f) {

            fwrite($f, $e->getNombreCliente()
                . ';' . date('d/m/Y', strtotime($e->getFecha()))
                . ';' . $e->getEntrada()
                . ';' . $e->getDescuento()
                .';'.$e->getImporte().PHP_EOL);


            $resultado=true;
        }
        return $resultado;
    }




}
