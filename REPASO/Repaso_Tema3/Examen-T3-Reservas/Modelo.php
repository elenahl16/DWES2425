<?php 

$mensaje='';

class Modelo{

    private $conexion;


    function __construct(){
        try {
            //aqui vamos hacer la conexion a la base de datos
            $this->conexion= new PDO('mysql:host=localhost;port=3306;dbame=reservas','root','root');
    
        } catch (PDOException $th) {
            global $mensaje;
            $mensaje = $th->getMessage();
        }
        
    }

    function obtenerUsuario(){
        try {
            
            
        } catch (PDOException $th) {
            global $mensaje;
            $mensaje = $th->getMessage();
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