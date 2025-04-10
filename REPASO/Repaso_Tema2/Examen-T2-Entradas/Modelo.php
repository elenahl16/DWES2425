<?php
require_once "Entrada.php";

class Modelo
{
    private $fichero = 'entrada.txt';

    function insertar(Entrada $e)
    {

        try {
            $f = fopen($this->fichero, 'a');

            //aqui lo que hacemos es escribir los datos en el fichero
            fwrite(
                $f,
                $e->getNombreCliente() . ';' . $e->getFechaEvento() . ';' . $e->getNumEntradas() . ';' . $e->getDescuento() . ';' . $e->getImporte() . PHP_EOL
            );
            fclose($f);
            return true;
        } catch (\Throwable $th) {
            echo 'Error al guardar la entrada:' . $th->getMessage();
        }

        return false;
    }

    function cargarEntradas(){

        $resultado = array();

        //primero tenemos que comprobar es si el fichero existe
        if (file_exists($this->fichero)) {
            //lo que hace la funcion file es cargar lo que hay dentro del fichero en un array 

            $tmp = file($this->fichero, FILE_IGNORE_NEW_LINES); //FILE_IGNORE_NEW_LINES es una constante que ignora el caracter de fin de linea

            //Con un foreach nos vamos a recorrer el fichero temporal linea por linea
            foreach ($tmp as $t) {
                $datos = explode(';', $t); //lo que hace el explode es crear un array quitando los ;
                $entrada = new Entrada($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5]);
                $resultado[]=$entrada;
            }
        }

        return $resultado;
    }
}
