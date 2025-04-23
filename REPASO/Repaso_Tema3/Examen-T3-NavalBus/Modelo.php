<?php
class Modelo{

    private $conexion=null;


    function __construct(){
            try {
                //aqui vamos hacer la conexion a la base de datos

            } catch (PDOException $th) {
                echo $th->getMessage();
            }
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