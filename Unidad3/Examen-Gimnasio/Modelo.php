<?php
class Modelo{
    private $conexion=null;

    function __construct(){

        try {
            //Primero tenemos que hacer la conection a la base de datos, de esta forma la hacemos más directa
            $this->conexion=new PDO('mysql:host=localhost;port=3306;dbname=gimnasio','root','root');

        } catch (PDOException $e) {
            
            $e->getMessage();
        }
        
    }

    public function obtenerUsuario($us,$ps){

        $resultado=null;

        try {
            //primero tenemos que hacer la consulta tenemos que ver si requiere parametros o no
            $consulta=$this->conexion->prepare('SELECT * FROM usuario
            WHERE usuario=? AND clave=sha2(?,0)');

            //segundo tenemos que rellenar el array con los parametros que queremos asignar
            $params=array($us,$ps);
            //tercero tenemos que ejecutar la consulta
            if($consulta->execute($params)){
                if($fila=$consulta->fetch()){
                    $resultado= new Usuario($fila['usuario'],
                    $fila['clave']);
                }
            }


        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $resultado;
    }



}
?>