<?php
require_once 'controlador.php';
require_once 'Notas.php';
require_once 'Asignaturas.php';

class Modelo
{

    private $conexion = null;

    function __construct()
    {
        try {
            $this->conexion = new PDO('mysql:host=localhost;port=3306;dbname=misNotas', 'root', 'root');
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    function obtenerAsignaturas()
    {

        $resultado = array();

        try {
            $consulta = $this->conexion->query('SELECT * FROM asignaturas');

            while ($fila = $consulta->fetch()) {
                $resultado[] = new Asignaturas($fila['id'], $fila['nombre']);
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    function crearNota($n)
    {

        $resultado = false;

        try {
            $consulta = $this->conexion->prepare('INSERT INTO notas VALUES(default,?,?,?,?,false)');

            $params = array($n->getAsignatura(), $n->getFecha(), $n->getDescripcion(), $n->getNota());

            if ($consulta->execute($params) and $consulta->rowCount() == 1) {
                $resultado = true;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    function obtenerNotas()
    {

        $resultado = array();

        try {
            $consulta = $this->conexion->query('SELECT * FROM notas
                                                order by fecha DESC');

            while ($fila = $consulta->fetch()) {
                $resultado[] = new Notas($fila['asignatura'], $fila['fecha'],$fila['tipo'],$fila['descripcion'],$fila['nota']);
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
