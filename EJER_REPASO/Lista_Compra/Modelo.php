<?php
require_once "Compra.php";
class Modelo{

    //DEFINIR ATRUBTOS: conexion, servidorbD, puerto, us, ps y bd

    private $conexion=null;
    private $servidorBd="localhost";
    private $puerto="3306";
    private $us="root";
    private $ps="";
    private $nombreBD="listaCompras";

    function __construct(){

        try {
            $this->conexion= new PDO('mysql:host=' .$this->servidorBd.';port=' . $this->puerto .';dbname=' . $this->nombreBD,
            $this->us,
            $this->ps);


        } catch (\Throwable $th) {
            echo $th -> getMessage();

        }
        
    }

    public function getConexion()
    {
        return $this->conexion;
    }

}
?>