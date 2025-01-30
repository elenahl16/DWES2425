<?php
require_once 'Contacto.php';

class Modelo{

    private $nombreFichero;

    function __construct($nombreFichero) {

        
    }
    

    function crearContacto(Conctacto $c) {

        try{
            $f =fopen($this->nombreFichero,'a+');
            fwrite($f,$c->getId().';'.$c->getNombre().';'.$c->getTelefono().
            ';'.$c->getTipo().';'.$c->getFoto().PHP_EOL);

        }catch(Throwable $t){
            echo $t-> getMessage();

        } finally{
            fclose($f);
        }
        
    }

    function obtenerContactos(){

        $resultado = array();
        try {

            if(file_exists($this->nombreFichero)){
                $registros=file($this->nombreFichero);

                foreach($registros as $linea){
                    $campo=explode(';',$linea);
                    $resultado[]=new Conctacto($campo[0],$campo[1],$campo[2],$campo[3],$campo[4]);

                } 
            }
           
        } catch (\Throwable $th) {
            echo $th-> getMessage();
        }

        return $resultado;
    }

    function obtenerID(){

        $resultado=1;

        try {
            if(file_exists($this->nombreFichero)){
                $registros=file($this->nombreFichero);
                //obtengo la posicion del array el último registro
                $pos=sizeof($registros) -1;
                $campo =explode(';',$registros[$pos]);
                $resultado=$campo[0]+1;

        }

        } catch (\Throwable $th) {
            echo $th-> getMessage();
        }
         return $resultado;

    }

    function obtenerContacto($telefono){

        //devuelve null si no hay un contacto para el telefono buscado
        //devuelve un objeto contacto si, si hay un contacto

        $resultado=null;
        try {

            if(file_exists($this->nombreFichero                                                                                                         )){
              $registros = file($this->nombreFichero);  
                foreach($registros as $linea){
                    $campo= explode(";",$linea);
                    if($campo[2]==$telefono){

                        //he encontrado un contacto para el telefono buscado
                        $resultado = new Conctacto($campo[0],$campo[1],$campo[2],$campo[3],$campo[4]);

                    }
                }


            }
          

        } catch (\Throwable $th) {
            echo 'Error al obtener contacto'.$th->getMessage();
        }

        return $resultado;

    }



}
?>