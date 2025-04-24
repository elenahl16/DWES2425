<?php

use App\Models\Recurso;

require_once 'Usuario.php';
require_once 'Recursos.php';
require_once 'Reservas.php';
$mensaje = '';

class Modelo
{

    private $conexion;


    function __construct()
    {
        try {
            //aqui vamos hacer la conexion a la base de datos
            $this->conexion = new PDO('mysql:host=localhost;port=3306;dbname=reservas', 'root', 'root');
        } catch (PDOException $th) {
            global $mensaje;
            $mensaje = $th->getMessage();
        }
    }

    function obtenerUsuario($usuario, $ps)
    {
        $respuesta = null;

        try {
            //primero lo que hacemos es la consulta que seria con prepare
            $consulta = $this->conexion->prepare('SELECT * FROM usuarios WHERE idRayuela=? AND ps=sha2(?,512)');
            //segundo tenemos que rellenar el array con los parametros que queremos asignar a las ? 
            //tambien lo podemos poner $params=[$usuario,$ps] seria un array igual

            $params = array($usuario, $ps);
            if ($consulta->execute($params)) {
                //
                if ($fila = $consulta->fetch()) {
                    $respuesta = new Usuarios(
                        $fila['idRayuela'],
                        $fila['nombre'],
                        $fila['activo'],
                        $fila['numReservas']
                    );
                }
            }
        } catch (PDOException $th) {
            global $mensaje;
            $mensaje = $th->getMessage();
        }

        return $respuesta;
    }

    function otbtenerRecursos()
    {
        $respuesta = array();

        try {
            //primero lo que hacemos es la consulta que seria con prepare
            $consulta = $this->conexion->query('SELECT * FROM recursos');

            while ($fila = $consulta->fetch()) {
                //aqui lo que queremos hacer es guardar
                $respuesta[] = new Recursos(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['tipo'],
                    $fila['descripcion']
                );
            }
        } catch (PDOException $th) {
            global $mensaje;
            $mensaje = $th->getMessage();
        }

        return $respuesta;
    }

    function obtenerReservas($recurso)
    {
        $respuesta = [];

        try {
            $consulta = $this->conexion->prepare('SELECT re.*, u.nombre as nombreU, rec.nombre as nombreR FROM reservas as re 
                                                 join recursos as rec on recurso =rec.id
                                                 join usuarios as u on usuario = idRayuela
                                                 where recurso = ? and anulada=false 
                                                 order by fecha desc;');
            $params = array($recurso);
            if ($consulta->execute($params)) {
                while ($fila = $consulta->fetch()) {
                    $respuesta[] = new Reservas(
                        $fila['id'],
                        new Usuarios($fila['usuario'],$fila['nombreU'],null,null),
                        new Recursos(null,$fila['nombreR']),
                        $fila['fecha'],
                        $fila['hora'],
                        $fila['anulada']
                    );
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $respuesta;
    }

    function verificarDisponibilidad($fecha,$recurso,$hora){

		$respuesta=false;

		try {
			$consulta=$this->conexion->prepare('SELECT disponibilidad(?,?,?)');
			$params=array($recurso,$fecha,$hora);

			if($consulta->execute($params)){
				if($fila=$consulta->fetch()){
					
					// seria lo mismo $respuesta=$fila[0];
					return $fila[0];
				}
			}
			
		} catch (\Throwable $th) {
			global $mensaje;
			$mensaje = $th->getMessage();
		}

		return $respuesta;

	}

	function guardarReserva($r){
		$respuesta=false;
		try {
			
			$this->conexion->beginTransaction();
			//Consulta para insertar la reserva
			$consulta=$this->conexion->prepare('INSERT into reservas(recurso,usuario,hora,fecha) values (?,?,?,?)');
			$params=array($r->getRecurso(),$r->getUsuario(),$r->getHora(),$r->getFecha());
			if($consulta->execute($params) and $consulta->rowCount()==1){
				$consulta=$this->conexion->prepare('UPDATE usuarios set numReservas=numReservas + 1 where idRayuela= ?');
				$params=array($r->getUsuario());

				if($consulta->execute($params) and $consulta->rowCount()==1){
					$this->conexion->commit();
					$respuesta=true;

				}else{
					$this->conexion->rollback();
					
				}
	
			}

		} catch (\Throwable $th) {

			$this->conexion->rollback();
			global $mensaje;
			$mensaje = $th->getMessage();
		}

		return $respuesta;

	}

	function infoUsuario($usuario)
	{
		$respuesta = null;
		try {
			$consulta = $this->conexion->prepare('SELECT * FROM usuarios WHERE idrayuela=?');
			$params = [$usuario];
			if ($consulta->execute($params)) {
				if ($fila = $consulta->fetch()) {
					$respuesta = new Usuarios($fila[0], $fila[1], $fila['activo'], $fila['numReservas']);
				}
			}
		} catch (\Throwable $th) {
			global $mensaje;
			$mensaje = $th->getMessage();
		}

		return $respuesta;
	}

	function anularReserva($usuario,$recurso,$fecha,$hora){
		
		$respuesta=false;
		try {
			
			$this->conexion->beginTransaction();
			//Consulta para insertar la reserva
			$consulta=$this->conexion->prepare('UPDATE reservas set anulada=true where usuario=? and recurso=? and fecha=? and hora=?');
			$params=array($usuario,$recurso,$fecha,$hora);

			if($consulta->execute($params) and $consulta->rowCount()==1){
				$consulta=$this->conexion->prepare('UPDATE usuarios set numReservas=numReservas - 1 where idRayuela= ?');
				$params=array($usuario);

				if($consulta->execute($params) and $consulta->rowCount()==1){
					$this->conexion->commit();
					$respuesta=true;

				}else{
					$this->conexion->rollback();
					
				}
	
			}

		} catch (\Throwable $th) {

			$this->conexion->rollback();
			global $mensaje;
			$mensaje = $th->getMessage();
		}

		return $respuesta;

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
