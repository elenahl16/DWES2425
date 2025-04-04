<?php
require_once "Modelo.php";
require_once "controlador.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión ONG</title>
</head>

<body>
    <div>
        <h1 style='color:red;'>Mensajes</h1>
        <?php
        //aqui mostramos los mensajes de error donde verifica si mensaje esta  definida y no es null 
        //se mostrara el mensaje de error y si no mostrara una cadena vacia
        echo (isset($mensaje) ? $mensaje : '')
        ?>
    </div>

    <!-- Formulario para seleccionar un centro -->
    <form action="" method="post">
        <label for="centro">Centro:</label>
        <select name="centro" id="centro">
            <?php
            //aqui recorremos todos los centros que hay en la base de datosd esta manera es mas directa 
            foreach ($bd->obtenerCentros() as $c) {
                echo '<option value="' . $c->getId() . '">' . $c->getNombre() . '</option>';
            }

            ?>
        </select>
        <button type="submit" name="seleccionarC">Seleccionar</button>
    </form>


    <!-- Datos del centro, aqui vamos a mostrar los datos del centro que hemos seleccionado que se va almacenar en la session -->
    <form action="" method="post">
        <h3>
            <?php
            $c = $_SESSION['centro']; //recuperar el valor que hay guardado en el centro
            echo $c->getNombre() . ' - ' . $c->getLocalidad();
            /*
                Otra forma de hacerlo más directa:
             *  echo $_SESSION['centro']->getNombre().'-'.$_SESSION['centro']->getLocalidad()
             */
            ?>
            <button type="submit" name="cambiarC">Cambiar Centro</button>
            <br></br>

            <?php
            //debajo mostramos los beneficiarios que hay en el centro y los servicios prestados
            $infoCentro=$bd->infoCentro($_SESSION['centro']->getId()); //
            echo 'Beneficiarios:'. $infoCentro[0]. ' - ' .'Servicios Prestados:'.$infoCentro[1];
            ?>
        </h3>
    </form>

    <!-- Formulario para asignar gestionar beneficiarios -->
    <form action="" method="post">
        <div>
            <label for="usuario">Beneficiario</label><br />
            <select name="beneficiario" id="beneficiario">
                <?php

                $beneficiarios= $bd->obtenerBeneficiariosC($_SESSION['centro']->getId());
                foreach($beneficiarios as $b){
                    echo '<option value="'.$b->getId().'">'.$b->getNombre().'-'.$b->getDni().'</option>';
                }
                ?>
            </select>
            <button type="submit" name="verSP">Ver Servicios Prestados</button>
            <button type="submit" name="borrarB">Borrar Beneficiario</button>
        </div>
        <p/>
        <div>
            <label for="usuario">Servicio</label><br />
            <select name="servicio" id="servicio">
                <?php
                //aqui muestro con un foreach ya que contiene un select los servicios
                foreach($bd->obtenerServicios() as $s){
                    echo '<option value="'.$s->getId().'">'.$s->getDescripcion().'</option>';
                }
                ?>
            </select>
        </div> 
        <p />
        <div>
            <button type="submit" name="asignarS">Asignar</button>
        </div>
    </form>
</body>

</html>