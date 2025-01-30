<?php 
require_once 'Usuarios.php';

class Modelo{

    private $conexion=null;

    function __construct(){

        try {
            //otra forma de hacer la conexion a la base de datos, es iguales que otras pero poniendo todo mas directo
            
            $this->conexion=new PDO('mysql:host=localhost;port=3306;dbname=reservas','root','root');

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    function login($idRayuela,$ps){

        $resultado=null;

        try {
            //primero tenemos que preparar la consulta dependiendo si es con o sin parametroa
            
            $consulta=$this->conexion->prepare('SELECT * FROM usuarios 
                                                where idRayuela=?  and ps=sha2(?,512)');
            
            $params=array($idRayuela,$ps); //rellenamos los parametros que queremos asignarle

            if($consulta->execute($params)){//ejecutamos la consulta con los parametros que le hemos asignado
                
                if($fila=$consulta->fetch()){
                    $resultado= new Usuarios($fila['idRayuela'],
                    $fila['nombre'],
                    $fila['activo']);
                }

            }
            
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $resultado;
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