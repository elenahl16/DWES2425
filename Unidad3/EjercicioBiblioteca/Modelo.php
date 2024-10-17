<?php
require_once 'USuario.php';

class Modelo{

    private $conexion;

    public function __construct(){
        
        try {

            $config = $this->obtenerDatos();

            if($config!=null){
                //Establecemos conexion con la bs
                 $this->conexion = new PDO('mysql:host='.$config['urlBD'].
                    ';port='.$config['puerto'].';dbname='.$config['nombreBD'],
                    $config['usBD']
                    ,$config['psUS']);
            }
            
            
        } catch (\Throwable $th) {
           echo $th ->getMessage();
        }

    }


    private function obtenerDatos(){

        $resultado=array();

        //si el fichero existe
        if(file_exists('.config')){
            $datosF=file('.config',FILE_IGNORE_NEW_LINES);

            foreach($datosF as $linea){
                $campo = explode('=',$linea);
                $resultado[$campo[0]] = $campo[1]; //estoy añadiendo
            }
        }
        else{
            return null;
        }
        return $resultado;
    }

    public function loguear($us,$ps){

        //devuelve null si los datos no son correctos y un objeto usuario si los datos son correcto
        //Ejecutamos la consulta selet * from usuarios wher id=nombreUS and ps=pUS cifrada
        $resultado = null;
        try {
            //preparar consulta
            $consulta = $this-> conexion->prepare('SELECT * FROM usuarios
                    where id=? and ps=sha2(?,512)');

            //Rellenar parametros
            $params=array($us,$ps);

            //Ejecutar consulta
            if($consulta->execute(($params))){

                //REcuoeramos el resultado y transformarlo en un objeto usuario
                if($fila=$consulta->fetch()){
                    $resultado= new Usuario($fila['id'],$fila['tipo']);
                }

            }

        } catch (\Throwable $th) {
            echo $th ->getMessage();
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

?>