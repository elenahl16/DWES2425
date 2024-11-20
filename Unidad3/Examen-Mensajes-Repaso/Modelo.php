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

function login(int $u, string $ps){

    try {
        
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
?>