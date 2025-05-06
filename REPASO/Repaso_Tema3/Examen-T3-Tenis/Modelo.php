<?php

use PHPUnit\Framework\ComparisonMethodDoesNotDeclareExactlyOneParameterException;

require_once 'controlador.php';
require_once 'Jugador.php';
require_once 'Partido.php';
require_once 'ResultadoPartido.php';
require_once 'resultados.php';
class Modelo
{

    private $conexion = null;

    function __construct()
    {

        try {

            $this->conexion = new PDO('mysql:host=localhost;port=3306;dbname=tenis', 'root', 'root');
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    function obtenerPartidos()
    {

        //lo guardamos en un array porque nos va a devolver varios registros
        $resultado = array();

        try {
            $consulta = $this->conexion->query('SELECT * FROM partido');

            //* guardamos los datos extraidos de la consulta en filas cada vez que se va recorriendo el bucle
            while ($fila = $consulta->fetch()) {
                $resultado[] = new Partido(
                    $fila['codigo'],
                    $fila['jugador1'],
                    $fila['jugador2'],
                    $fila['fecha'],
                    $fila['numSets'],
                    $fila['finalizado']
                );
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $resultado;
    }
    function obtenerPartido($codigo)
    {

        $resultado = null;

        try {
            //primero preparamos la consulta
            $consulta = $this->conexion->prepare('SELECT * FROM partido WHERE codigo=?');

            //asignamos datos al parametro
            $params = array($codigo);

            if ($consulta->execute($params)) {
                if ($fila = $consulta->fetch()) {
                    $resultado = new Partido(
                        $fila['codigo'],
                        $fila['jugador1'],
                        $fila['jugador2'],
                        $fila['fecha'],
                        $fila['numSets'],
                        $fila['finalizado']
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
