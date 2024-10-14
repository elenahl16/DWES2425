<?php
require_once "Modelo.php";
$modelo = new Modelo(); //creamos un objeto de la clase modelo

//tenemos que cargar todas las asignaturas en un array
$asignatura = $modelo->obtenerAsignaturas();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion notas</title>
</head>

<body>
    <h3>Mi Gestion de Notas y Exámenes 2ºDAW</h3>

    <form action="#" method="post">
        <div>
            <label for="asign">Asignatura</label></br>
            <select name="asign" id="asign">

                <!-- Hay que hacer un option para cada asignatura-->
                <?php
                //lo que hago es recorrer
                foreach($asignatura as $a){
                    echo "<option>".$a. "</option>";
                }

                ?>

            </select>
        </div>
        </br>
        <div>
            <label for="fecha_nota">Fecha creacion Notas:</label>
            <input type="date" name="fecha_nota" id="fecha_nota">
        </div>

        </br>
        <div>
            <label for="descrip">Descripcion:</label>
            <input type="text" name="descrip" id="descrip">

        </div>
        </br>
        <div>
            <label>Tipo:</label></br>
            <input type="radio" name="tipo" id="ex" value="Examen" checked="checked">
            <label for="examen">Examen</label>

            <input type="radio" name="tipo" id="tarea" value="Tarea" checked="checked">
            <label for="tarea">Tarea</label>
        </div>
        </br>
        <button type="submit">Crear Notas</button>
    </form>
</body>

</html>