<?php
require_once 'Usuario.php';
require_once 'Socio.php';
require_once 'Libro.php';
class Modelo{

    private $conexion=null;

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
            
            
        } catch (Throwable $th) {
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
            if($consulta->execute($params)){

                //Recuperamos el resultado y transformarlo en un objeto usuario
                if($fila=$consulta->fetch()){
                    $resultado= new Usuario($fila['id'],$fila['tipo']);
                }

            }

        } catch (\Throwable $th) {
            echo $th ->getMessage();
        }

        return $resultado;

    }

    function obtenerSocios(){

        //Devuelve un array vacio si no hay socios
        //Si hay socios devuelve un array con objetos socios
        $resultado=array();

        try {
            $textoConsulta='SELECT * FROM socios order by nombre';
            //Ejecutar consulta

            $c=$this->conexion->query($textoConsulta);
            if($c){
                //accede al resultado de la consulta

                while ($fila=$c->fetch()){
                    $resultado[]=new Socio($fila['id'],$fila['nombre'],
                $fila['fechaSancion'],$fila['email'],$fila['us']);
                    
                    
                }
            }
            
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    function obtenerLibros(){

        
        //Devuelve un array vacio si no hay socios
        //Si hay socios devuelve un array con objetos socios
        $resultado=array();

        try {
            $textoConsulta='SELECT * FROM libros order by titulo';
            //Ejecutar consulta

            $c=$this->conexion->query($textoConsulta);

            if($c){
                //accede al resultado de la consulta

                while ($fila=$c->fetch()){
                    $resultado[]=new Libro($fila['id'],$fila['titulo'],
                    $fila['ejemplares'],$fila['autor']);    
                }
            }
            
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    public function comprobar($socio,$libro){

        $resultado='ok';

        try {
            //tenemos que llamar a la funcion de la bd comprobar
            $consulta=$this->conexion->prepare('SELECT comprobarSiPrestar(?,?)');
            $params=array($socio,$libro);

            if($consulta->execute($params)){
                if($fila=$consulta->fetch()){
                    $codigo=$fila[0];

                    switch ($codigo) {
                        case -1:
                            $resultado='No hay ejemplares del libro o el libro no existe';
                            break;

                        case -2:
                            $resultado='El socio esta sancionando o el socio no existe';
                            break;
                        
                        case -3:
                            $resultado='El socio tiene préstamos caducados';
                            break;
    
                        case -4:
                            $resultado='El socio tiene más de 2 libros prestados';
                            break;
                        
                        default:
                            
                    }

                }

            }

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $resultado;
    }

    function crearPrestamo($idSocio,$idLibro){

        $resultado=0;

        try {
            //iniciamos la transacion ya que vamos hacer un insert y un update
            $this->conexion->beginTransaction();
            
            //Hacemos aqui el insert
            $consulta= $this->conexion->prepare('INSERT into prestamos value
             (null,?,?,curdate(), adddate(curdate(), INTERVAL 30 DAY),null)');

            $params=array($idSocio,$idLibro);

            if($consulta->execute($params)){
                //comprobamos si se ha insertado una fila, por eso utilizamos un rowCount

                if ($consulta->rowCount()==1) {
                    //obtenemos el id del prestamo creado
                    $id = $this->conexion->lastInsertId();

                    //update
                    $consulta= $this->conexion->prepare('UPDATE into libros set ejemplares=ejemplares-1
                    where id = ?');
                    $params=array($idLibro);

                    if ($consulta->execute($params) and $consulta->rowCount()==1) {
                        $this->conexion->commit();
                        $resultado=$id;
                    }
                    else {
                        $this->conexion->rollBack(); //deshacemos el insert
                    }
       

                }

            }

        } catch (PDOException $se) {
            $this->conexion->rollBack();

            echo $se->getMessage();

        }  catch (Throwable $th) {
            echo $th->getMessage();
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