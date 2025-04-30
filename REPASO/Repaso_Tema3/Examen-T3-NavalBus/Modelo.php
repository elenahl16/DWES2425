<?php
require_once "Linea.php";
require_once "Billete.php";
require_once "Servicio.php";
require_once "Conductor.php";

class Modelo
{

    private $conexion = null;


    function __construct()
    {
        try {
            //*hacemo la conexion a la base de datos
            $this->conexion = new PDO('mysql:host=localhost;port=3306;dbname=navalBus', 'root', 'root');
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    function obtenerLinea($id)
    {

        //* en la consulta para obtener la linea solo se va a mostrar un objeto por lo tanto declaramos $resultado=null
        //* si nos devuelve mas de un dato entonces lo guardamos en array
        $resultado = null;

        try {
            //primero lo que hacemos es preparar la consulta con prepare porque le estamos pasando datos
            $consulta = $this->conexion->prepare('SELECT * FROM Lineas
                                                WHERE id=?');
            //* Despues rellenamos los datos que queremos darle al parametro que es el id
            $params = array($id);

            if ($consulta->execute($params)) { //*ejecutamos la consulta con los parametros que le hemos asignado
                if ($fila = $consulta->fetch()) {
                    $resultado = new Linea($fila["id"], $fila["nombre"], $fila["origen"], $fila["destino"]);
                }
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $resultado;
    }

    function obtenerLineas()
    {
        //? el $resultado lo guardamos en un array porque la consulta nos va a devolver más de un datos
        $resultado = array();

        try {
            //primero lo que hacemos es preparar la consulta con query porque no le estamos pasando ningun datos
            $consulta = $this->conexion->query('SELECT * FROM Lineas');

            while ($fila = $consulta->fetch()) {
                //aqui lo que queremos hacer es guardar es $resultado lo que nos devuelva
                $resultado[] = new Linea(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['origen'],
                    $fila['destino']
                );
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    function obtenerConductor($id)
    {

        $resultado = array();

        try {
            $consulta = $this->conexion->prepare('SELECT * FROM Conductores
                                                where id=?;');
            $params = array($id);

            if ($consulta->execute($params)) {

                if ($fila = $consulta->fetch()) {
                    $resultado[] = new Conductor($fila['id'], $fila['nombreApe'], 
                    $fila['telefono'], $fila['fechaContrato']);
                }
            }
        } catch (PDOException $th) {
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
