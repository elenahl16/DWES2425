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

    <form action="" method="post">
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
    <?php
    if(isset($_POST['crear'])){
        if(empty($_POST['asig']) or empty($_POST['fecha']) or empty($_POST['desc']) or empty($_POST['tipo']) or empty($_POST['nota'])){
            echo '<h3 style="color:red;">Rellena todos los campos</h3>';
        }
        else{
            $n = new Notas($_POST['asig'],$_POST['fecha'],$_POST['tipo'],$_POST['desc'],$_POST['nota']);
            $modelo->crearNota($n);
        }
    }  
    
    ?>
    <h2>Notas</h2>
    <table border="1">
        <tr>
            <th>Asignatura</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Nota</th>
        </tr>
    <?php
    $nota=$modelo->obtenerNotas();
    foreach($nota as $n){
        echo '<tr>';
        echo '<td>'.$n->getAsig().'</td>';
        echo '<td>'.date('d/m/Y',strtotime($n->getFecha())).'</td>';
        echo '<td>'.$n->getTipo().'</td>';
        echo '<td>'.$n->getDescrip().'</td>';
        echo '<td>'.$n->getNota().'</td>';
        echo '</tr>';
    }
    ?>
    </table>
</body>
</html>