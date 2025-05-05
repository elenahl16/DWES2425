<?php

use Illuminate\Support\Arr;

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

        //* en la consulta para obtener la linea solo se va a mostrar un objeto por lo tanto declaramos $resultado=null donde nos devuelve un objeto
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

        $resultado = null;

        try {
            $consulta = $this->conexion->prepare('SELECT * FROM Conductores
                                                where id=?;');
            $params = array($id);

            if ($consulta->execute($params)) {

                if ($fila = $consulta->fetch()) {
                    $resultado = new Conductor(
                        $fila['id'],
                        $fila['nombreApe'],
                        $fila['telefono'],
                        $fila['fechaContrato']
                    );
                }
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    function crearServicio($c, $l)
    {
        //metodo donde vamos a crear un servicio para linea y conductore
        $resultado = false;

        try {
            //primero preparamos la consulta
            $consulta = $this->conexion->prepare('INSERT INTO Servicios values (default,now(),?,?,0,false)');

            //Despues tenemos que rellenar los parametros
            $params = array($c->getId(), $l->getId());

            //ejecutamos la consulta, el rowCount lo que hace cuántas filas nuevas se insertaron depende de donde lo utilicemos.
            if ($consulta->execute($params)) {
                if ($consulta->rowCount() == 1) {
                    $resultado = true;
                }
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }

        return $resultado;
    }

    function ObtenerPrecioActual($tipo){
        
        $resultado=0;

        try {
           //* Primero preparamos la consulta SQL con parámetro. Va a llamar a la función de MySQL 
           //* ObtenerPrecioActual(?), pasando el valor que luego le asignarás.
           $consulta=$this->conexion->prepare('SELECT ObtenerPrecioActual(?)');

           //* Prepara el array de parámetros para usarlo al ejecutar la consulta. 
           $params=array($tipo);
            
           //* Ejecutamos la consulta e preparada con los parámetros dados.
           if($consulta->execute($params)){
            //* Obtiene el primer resultado devuelto por la función MySQL. Devuelve un unico valor que seria un numero decimal
               
                if($fila=$consulta->fetch()){
                    //? Guarda el valor numérico devuelto por la función ObtenerPrecioActual en la variable $resultado.
                    $resultado= $fila[0];
                }
           }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    function obtenerBilletes(){
        
        $resultado=array();

        try {
            $consulta=$this->conexion->prepare('SELECT * FROM billetes as b
                                             join lineas as l on l.id =b.linea
                                            where conductor= ?');

        } catch (\Throwable $th) {
            //throw $th;
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
