<?php
require_once "Notas.php";

class Modelo{

    private $nombreFA = 'asig.dat'; //nombre del fichero donde guarda las asignaturas
    private $nombreFN = 'notas.dat'; //nombre del fichero donde guarda las notas


    function __construct(){
        //Cosntructor

        //$this se utiliza dentro de una clase para acceder a sus propiedades o método

    }


    function crearNota(Notas $n){

        /*
        1. tenemos que abrar el fichero donde queremos escribir
        2. fopen($this->nombreFN, 'a+'): Esta función abre el archivo cuyo nombre está almacenado 
           en la propiedad $nombreFN de la clase.
        3. fwrite ($nombreFN,$n ...) lo que hace esta funcion es escribir el fichero $nombreFN del objeto
            notas
        */

        try {
            $nombreFN=fopen($this->nombreFN,'a+');
            fwrite($nombreFN,$n->getAsig().';'.$n->getFecha().';'.
            $n->getTipo().';'.$n->getFecha().';'.$n->getDescrip().';'.$n->getNota().PHP_EOL);

        } catch (\Throwable $th) {
            echo 'Error al obtener la nota' . $th->getMessage();
        }
        finally{
            fclose($nombreFN);
        }
    }

    function obtenerNota() {


    }

    function obtenerAsignaturas(){

        $resultado = array();

        try {

            //Si el fichero existe llamamos a la variable objeto donde va a estar referenciado nuestro fichero
            if (file_exists($this->nombreFA)) {
                $resultado = file($this->nombreFA); //almacenamos en la variable resultado donde file va a leer
                //el contenido del archivo al que nos estamos refiriendo y lo devuelve como un array
            }
        } catch (\Throwable $th) {
            echo 'Error al obtener contacto' . $th->getMessage();
        }

        return $resultado;
    }
}
