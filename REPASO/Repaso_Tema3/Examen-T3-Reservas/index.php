<?php
require_once 'Modelo.php';
require_once 'controlador.php';

if ($bd->getConexion() == null) {
    echo ('Error no hay conexion en la base de datos:' . $mensaje);
} else {


?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Reservas IES Augustóbriga</title>
    </head>

    <body>
        <!-- Sección de Mensajes 
    lo que hago es mostrar con echo si hay mensaje si 
    se cumple la condicion nos muestra el mensaje si no lo deja vacio -->
        <section>
            <h3 style="color:red"><?php echo (isset($mensaje) ? $mensaje : '') ?></h3>
        </section>

        <?php
        //si no existe la sesion 
        if (!isset($_SESSION['usuario'])) {


        ?>
            <h1>Reservas IES Augustóbriga</h1>
            <!-- Sección de Login -->
            <section>
                <h2>Login</h2>
                <form action="" method="POST">
                    <label for="usuario">Usuario</label><br />
                    <input type="text" name="usuario" /><br />
                    <label for="ps">Contraseña</label><br />
                    <input type="password" name="ps"><br /><br />
                    <button type="submit" name="acceder">Acceder</button>
                </form>
            </section>
        <?php
        } else {


        ?>

            <!-- Información de usuario logueado -->

            <form method="post">
                <section>
                    <table width="100%">
                        <tr>
                            <td>
                                <h3 style="color:blue">Id Rayuela</h3>
                            </td>
                            <td>
                                <h3 style="color:blue">Nombre</h3>
                            </td>
                            <td>
                                <h3 style="color:blue">Número de Reservas</h3>
                            </td>
                            <td>
                                <h3 style="color:blue">Color Reservas</h3>

                                <input type="color" name="color" value="<?php echo (isset($_COOKIE['color']) ? $_COOKIE['color'] : '') ?>" />
                                <input type="submit" name="cambiarColor" value="cambiar" />
                            </td>
                            <td>
                                <input type="submit" name="salir" value="Salir" />
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['usuario']->getIdRayuela(); ?> </td>
                            <td><?php echo $_SESSION['usuario']->getNombre(); ?> </td>
                            <td><?php echo $_SESSION['usuario']->getNumReservas(); ?> </td>
                            <td>
                            </td>
                        </tr>
                    </table>
                </section>
                <!-- Seleccionar Recurso -->
                <section>
                    <h3 style="color:blue">Selecciona Recurso</h3>
                    <?php
                    $recurso = $bd->obtenerRecursos();
                    ?>
                    <select name="recurso">
                        <?php
                        //aqui nos vamos a recorrer con un foreach los recursos que tenemos
                        foreach ($recurso as $r) {
                            //mostramos el id y el nombre del recurso, con id es como identificaremos el recurso
                            echo '<option value="' . $r->getId() . '"' . (isset($_POST['recurso']) && $_POST['recurso'] == $r->getId() ? 'selected="selected"' : '') . '>' . $r->getNombre() . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="verR" value="verReservas" />
                    <table width="50%">
                        <tr>
                            <td>Id</td>
                            <td>Usuario</td>
                            <td>Recurso</td>
                            <td>Fecha</td>
                            <td>Hora</td>
                            <?php
                            //lo que hacamos si existe la reserva 
                            if(isset($reservas)){
                                //nos recorremos las reservas y dentro lo que hacemos es cerrar php para poder escribir codigo html
                               foreach($reservas as $r){
                                ?>
                                <tr style="color: <?php echo(isset($_COOKIE['color']) &&
                                 $_SESSION['usuario']->getIdRayuela() == $r->getUsuario()->getIdRayuela() ? $_COOKIE['color']:'black')?>">
                                    <td><?php echo $r->getId() ?></td>
                                    <td><?php echo $r->getUsuario()->getNombre() ?></td>
                                    <td><?php echo $r->getRecurso()->getNombre() ?></td>
                                    <td><?php echo $r->getFecha() ?></td>
                                    <td><?php echo $r->getHora() ?></td>
                                </tr>
                                <?php
                               }
                            }
                            ?>
                            
                        </tr>
                    </table>
                </section>
                <!-- Crear/anular reserva -->
                <section>
                    <h3 style="color:blue">Crear/Anular Reserva</h3>
                    <label for="fecha">Fecha Reserva</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo (!empty($_POST['fecha'])?$_POST['fecha']:date('Y-m-d'))?>"/>

                    <label for="hora">Hora Reserva</label>
                    <select name="hora" id="hora">
                        <option value="1">Primera</option>
                        <option value="2">Segunda</option>
                        <option value="3">Tercera</option>
                        <option value="4">Cuarta</option>
                        <option value="5">Quinta</option>
                        <option value="6">Sexta</option>
                    </select>
                    <button type="submit" name="reservar">Reservar</button>
                    <button type="submit" name="anular">Anular</button>
                </section>
            </form>
        <?php
        }
        ?>

    </body>

    </html>
<?php
}
?>