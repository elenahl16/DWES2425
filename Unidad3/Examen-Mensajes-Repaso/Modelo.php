<?php
require_once "Departamento.php";
require_once "Empleado.php";
require_once "Mensaje.php";

class Modelo{

//Declaro los actibutos para poder hacer la conexion hay varias formas
//La url contiene la conexion de forma directa a la bd conteniendo (gestorbd;servidorbd;puerto;nombrebd)
private $url='mysql:host=localhost;port=3306;dbname=mensajes';
private $us='root';
private $ps='';

private $conexion=null;

function __construct(){

    try {
     //hacemos la conexion a nuestra base de datos
        $this->conexion=new PDO($this->url,$this->us,$this->ps);
       
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    /*OTRA FORMA ES DECLARAR TODAS LAS VARIABLES UNA A UNA DIRECTAMENTE
       try {
            $this->conexion= new PDO('mysql:host=' .$this->servidorBd.
            ';port=' . $this->puerto .';dbname=' . $this->nombreBD,
            $this->us,
            $this->ps);

        } catch (\Throwable $th) {
            echo $th -> getMessage();
        }
    */
    
}

function obtenerEmpleado(int $us){//vamos a obtener los empleados por su id

    $resultado=0;

    try {
       $consulta=$this->conexion->prepare('SELECT * FROM empleado e
                                inner join departamento d on e.departamento=d.idDep
                                where d.idDep= ?');
        
        $params=array($us);

        if($consulta->execute($params)){
            if($fila=$consulta->fetch()){
                $resultado = new Empleado($fila['idEmp'],
                    $fila['dni'],$fila['nombreEmp'],
                    $fila['fechaNac'],new Departamento($fila['idDep'],$fila['nombre']),
                    $fila['cambiarPs']);
            }

        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $resultado;
}


function login(int $us, string $ps){

    $resultado=0;//inicializamos el resultado a 0, para devolver si algo falla

    try {
        //lo que tenemos que hacer es ejecutar la funcion de login de la base de datos
        //Hacemos primero la consulta con prepare porque tiene parametros
        $consulta=$this->conexion->prepare('SELECT login(?,?)');
        //el segundo paso lo que hace es rellenar con un array los valores a sustituir por ?
        $params=array($us,$ps);
        //por ultimo lo que hacemos es ejecutar la consulta con los parametros asignados
        if($consulta->execute($params)){
            if($fila=$consulta->fetch()){
                //devolvemos lo que nos devuelve la funcion login
                return $fila[0];
            }
        }
        
    } catch (\Throwable $th) {
        //throw $th;
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
public function setConexion($conexion){
    $this->conexion = $conexion;
    return $this;
    }
}
?>