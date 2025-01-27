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

    function obtenerCentro($id)
    {
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

    function infoCentro($id)
    {
        //tenemos que llamar al procedimiento 
        $resultado = array();
        try {
            $consulta = $this->conexion->prepare('CALL infocentro(?)');
            $params = array($id);
            if ($consulta->execute($params)) {
                if ($fila = $consulta->fetch()) {
                    //aqui mostramos los resultado
                    $resultado[] = $fila['numBeneficiarios'];
                    $resultado[] = $fila['numServiciosP'];
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $resultado;
    }

    function obtenerBeneficiariosC($id)
    {
        //funcion donde vamos a obtner los beneficiarios de un centro a traves del id

        $resultado = array();

        try {
            $consulta = $this->conexion->prepare('SELECT * from beneficiarios
                                                where centro= ?
                                                order by nombre ASC');
            $params = array($id);
            if ($consulta->execute($params)) {
                if ($fila = $consulta->fetch()) {
                    //aqui mostramos los resultado
                    $resultado[] = new Beneficiario(
                        $fila['id'],
                        $fila['dni'],
                        $fila['nombre'],
                        $fila['centro'],
                        $fila['dni'],
                        $fila['fechaN'],
                        $fila['direccion'],
                    );
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $resultado;
    }

    function obtenerServicios(){
        $resultado = array();
        try {
            $consulta = $this->conexion->query('SELECT * FROM servicios');
            while ($fila = $consulta->fetch()) {
                $resultado[] = new Servicio(
                    $fila['id'],
                    $fila['nombreServicio'],
                    $fila['descripcion']
                );
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
