<?php
require_once "Trabajo.php";
class Modelo{

    private $nombreF="trabajo.txt";//aqui creamos la variable donde vamos a guardar el fichero

    function __construct(){
        
    }

    function guardarTrabajo(){
        
        $resultado=false;

        //1 tenemos que abrir el fichero
        $f=fopen($this->nombreF,'a+');
        if($f){
            //2 escribirmos dentro del fichero una vez le tengamos abierto y le damos el formato que queramos
            fwrite($f,date('d/m/Y', strtotime($t->getFecha()))
            .';'.$t->getCliente()
            .';'.$t->getTipo()
            .';'.$t->getServicio()
            .';'.$t->getImporte().PHP_EOL);

            $resultado=true;
        }
        return $resultado;
    }

    function obtenerTrabajo(){

        $resultado=array();

        if(file_exists($this->nombreF)){
            $trabajos = file($this->nombreF,FILE_IGNORE_NEW_LINES);
            foreach ($trabajos as $t) {
                $fila = explode(';',$t);
                
            }

        }
    }

}
?>