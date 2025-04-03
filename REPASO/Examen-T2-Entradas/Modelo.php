<?php
require_once "Entrada.php";

class Modelo{
    private $fichero = 'entrada.txt';

    function insertar(Entrada $e) {

        try {
        $f = fopen($this->fichero, 'a');

        //aqui lo que hacemos es escribir los datos en el fichero
        fwrite(
            $f, $e->getNombreCliente().';'. $e->getFechaEvento().';'.$e->getNumEntradas().';'.$e->getDescuento().';'. $e->getImporte().PHP_EOL);
            fclose($f);
            return true;

        } catch (\Throwable $th) {
            echo 'Error al guardar la entrada:'.$th->getMessage();
        }

        return false;
    }

    function cargar() {}
}
