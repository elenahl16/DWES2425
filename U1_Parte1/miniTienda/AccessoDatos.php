<?php

//el requiere_once lo que hace
require_once 'Ticket.php';

class AccesoDatos{

    private $nombre;


    // los -- solo son obligatorios ponerlos en el constructor y en el descontructor
    function __construct($n)
    {

        $this->nombre = $n;
    }


    function insertarProducto(Ticket $t)
    {

        try {

            //Abrimos el fichero
            $fichero = fopen($this->nombre, 'a+');

            //Insertamos al final
            fwrite($fichero, $t->getProducto() . ';' . $t->getPrecio() . ';' . $t->getCantidad() .
                ';' . $t->getTotal() . PHP_EOL);
        } catch (Throwable $e) {

            $e->getMessage();
        } finally {


            //siempre que abramos un fichero tenemos que cerrarlo
            $fichero = fclose($fichero);
        }
    }

    function obtenerProducto()
    {

        $resultado = array();
        try {
            //cargamos el fichero en un array
            if (file_exists($this->nombre)) {
                $tmp = file($this->nombre);

                foreach ($tmp as $linea) {
                    $campos = explode(';', $linea);

                    //creamos un objeto ticket
                    $t = new Ticket($campos[0], $campos[1], $campos[2]);

                    //añadimos $t al array de objetos resultado
                    $resultado[] = $t;
                }
            }
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
}
