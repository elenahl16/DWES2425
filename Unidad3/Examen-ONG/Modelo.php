<?php
require_once "Beneficiario.php";
require_once "Centro.php";
require_once "Servicio.php";
require_once "ServicioUsuario.php";

class Modelo
{

    private $conexion = null;

    function __construct()
    {

        try {
            //aqui hacemmos la conexion a la base de datos
            $this->conexion = new PDO('mysql:host=localhost;dbname=ong', 'root', 'root');
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function obtenerCentros()
    {
        //funcion donde obtenemos todos los centros que hay en la base de datos

        $resultado = array();

        try {
            $consulta = $this->conexion->query('SELECT * FROM centros');
            while ($fila = $consulta->fetch()) {
                $resultado[] = new Centro(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['localidad'],
                    $fila['activo']
                );
            }
        } catch (\Throwable $th) {

            $th->getMessage();
        }

        return $resultado;
    }

    function obtenerCentro($id){
        //funcion donde obtenemos solo los centros que esten activos
        $resultado = null;
        try {

            $consulta = $this->conexion->prepare('SELECT * FROM centros WHERE id=?');
            $param = array($id);
            if ($consulta->execute($param)) {
                if ($fila = $consulta->fetch()) {
    
                    $resultado = new Centro(
                        $fila['id'],
                        $fila['nombre'],
                        $fila['localidad'],
                        $fila['activo']
                    );
                }
            }
        } catch (\Throwable $th) {

            $th->getMessage();
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
