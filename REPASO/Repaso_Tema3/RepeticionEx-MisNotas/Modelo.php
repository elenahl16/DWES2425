<?php
require_once 'Notas.php';
require_once 'Asignaturas.php';

class Modelo{

    private $conexion=null;

    function __construct(){

        //primero lo que hacemos es la conexion a la base de datos
        try {
            $this->conexion=new PDO('mysql:host=localhost;port=3306;dbname=misnotas','root','root');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        
    }

    function obtenerAsignaturas(){
        
    }

    /**
     * Get the value of conexion
     */ 
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * Set the value of conexion
     *
     * @return  self
     */ 
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;

        return $this;
    }
}
?>