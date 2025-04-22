<?php
require_once 'Usuario.php';
require_once 'Recursos.php';
require_once 'Reservas.php';
$mensaje = '';

class Modelo
{

    private $conexion;


    function __construct()
    {
        try {
            //aqui vamos hacer la conexion a la base de datos
            $this->conexion = new PDO('mysql:host=localhost;port=3306;dbname=reservas', 'root', 'root');
        } catch (PDOException $th) {
            global $mensaje;
            $mensaje = $th->getMessage();
        }
    }

    function obtenerUsuario($usuario, $ps)
    {
        $respuesta = null;

        try {
            //primero lo que hacemos es la consulta que seria con prepare
            $consulta = $this->conexion->prepare('SELECT * FROM usuarios WHERE idRayuela=? AND ps=sha2(?,512)');
            //segundo tenemos que rellenar el array con los parametros que queremos asignar a las ? 
            //tambien lo podemos poner $params=[$usuario,$ps] seria un array igual

            $params = array($usuario, $ps);
            if ($consulta->execute($params)) {
                //
                if ($fila = $consulta->fetch()) {
                    $respuesta = new Usuarios(
                        $fila['idRayuela'],
                        $fila['nombre'],
                        $fila['activo'],
                        $fila['numReservas']
                    );
                }
            }
        } catch (PDOException $th) {
            global $mensaje;
            $mensaje = $th->getMessage();
        }

        return $respuesta;
    }

    function otbtenerRecurso(){
        $respuesta = array();

        try {
            //primero lo que hacemos es la consulta que seria con prepare
            $consulta = $this->conexion->query('SELECT * FROM recursos');
            
            
        
        } catch (PDOException $th) {
            global $mensaje;
            $mensaje = $th->getMessage();
        }

        return $respuesta;  
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
