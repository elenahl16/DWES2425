<?php
require_once "Modelo.php";

//Primero antes de empezar tenemos que comprobar si tenemos conexion a la base de datos
$bd= new Modelo();
if($bd->getConexion()==null){//comprobamos que si la conexion es igual a null nos sale un mensaje de error
    $mensajeError= 'Error, no hay conexión en la bd';
}
else{

    //Pero si tenemos conexion comprobamos de que el usuario pueda acceder (tenemos que validar los errores)
    //Si se ha pulsado acceder 
    if(isset($_POST['acceder'])){

        if(empty($_POST['usuario']) or empty($_POST['ps']) ){
            $mensajeError='Error, no puede estar el usuario vacio ni la contraseña';
        }
        else{
            //si no esta vacio el usuario y la contraseña nos tiene que retorna 1 si todo es correcto
            // y 0 si hay error en el usuario o en la contraseña al hacer login

            //lo que hace es llamar al metodo login donde le vamos a pasar un usuario y una contraseña si es igual a 0 no hay ningun usuario con ese us y ps
            $retorna=$bd->login($_POST['usuario'],$_POST['ps']);

            if($retorna == 0){
                $mensaje= 'No existe ningun usuario';
            }
            else if($retorna == 1){
                //esque todo esta correcto y tenemos que recuperar la informacion del usuario es decir seleccionar 
                //todos los empleados 
                $us=$bd->obtenerEmpleado($_POST['usuario']);
                
                //guardamos la sesion
                session_start();
                $_SESSION['usuario']=$usuario; // lo que hace es guardar el valor de $usuario en la sesión.
                header('location:mensajes,php');
            }

        }
    
    }


}

?>
<!doctype html>
<html>
      <head>
        <meta charset="utf-8">
        <title>Examen 22_23</title>
       </head>
     <body>     	
 			<div> 
                <h1 style='color:red;'>mostrar mensaje si es necesario</h1> 
            </div>    
        	<form action="login.php" method="post">              	
            		<h1>Login</h1>    
            		<div> 
                		<label for="usuario">Id de Empleado</label><br/>           		
                        <input type="text" id="usuario" name="usuario"/>  
                    </div>
                    <div> 
                        <label for="ps">Contraseña</label><br/>                           
                        <input type="password" id="ps" name="ps"/>      
                    </div>                               
                    <br/><button type="submit" name="acceder">Acceder</button>                        
      		</form>           
	</body>
</html>