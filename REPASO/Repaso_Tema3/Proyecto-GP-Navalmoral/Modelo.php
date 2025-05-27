<?php
require_once 'Piloto.php';
require_once 'Vuelta.php';

class Modelo
{

    private $conexion = null;


    function __construct()
    {
        try {
            $this->conexion = new PDO('mysql:host=localhost;port=3306;dbname=gpNavalmoral', 'root', 'root');
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    function obtenerPilotos()
    {
        $resultado = array();

        try {
            $consulta = $this->conexion->query('SELECT * FROM pilotos');

            while ($fila = $consulta->fetch()) {

                $resultado[] = new Piloto(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['escuderia']
                );
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $resultado;
    }

    function obtenerPiloto($id)
    {

        $resultado = null;

        try {
            $consulta = $this->conexion->prepare('SELECT * FROM pilotos WHERE id=?');

            $params = array($id);

            if ($consulta->execute($params)) {

                if ($fila = $consulta->fetch()) {
                    $resultado = new Piloto(
                        $fila['id'],
                        $fila['nombre'],
                        $fila['escuderia']
                    );
                }
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    function crearVueltas($idP, $tiempo)
    {

        $resultado = false;

        try {
            $consulta = $this->conexion->prepare('INSERT INTO vueltas (piloto_id,tiempo,anulado) VALUES (?,?,false)');

            $params = array($idP, $tiempo);

            if ($consulta->execute($params)) {

                if ($consulta->rowCount() == 1) {
                    $resultado = true;
                }
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $resultado;
    }

    function obtenerVueltas($idP)
    {
        //con este metodo lo que vamos hacer es obtener todas las vueltas de ese piloto
        $resultado = array();

        try {
            $consulta = $this->conexion->prepare('SELECT * FROM vueltas WHERE piloto_id=?');

            $params = array($idP);
            if ($consulta->execute($params)) {
                while ($fila = $consulta->fetch()) {
                    $resultado[] = new Vuelta(
                        $fila['id'],
                        $fila['piloto_id'],
                        $fila['tiempo'],
                        $fila['anulado']
                    );
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
