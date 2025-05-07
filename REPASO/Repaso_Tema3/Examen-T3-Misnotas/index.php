<?php
require_once 'Modelo.php';
require_once 'controlador.php';
$bd = new Modelo();

if ($bd->getConexion() == null) {
    $mensaje = "Error no hay conexion en la base de dato";
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mis Notas</title>
    </head>

    <body>
        <h3>
            <?php
            echo (isset($mensaje) ? $mensaje : '')
            ?>
        </h3>
        <form action="" method="post">
            <select name="asignatura" id="asignatura">
                <?php
                foreach ($bd->obtenerAsignaturas() as $a) {
                    echo '<option value="' . $a->getId() . '">' . $a->getNombre() . '</option>';
                }
                ?>
            </select>

            <br></br>
            <label for="">Fecha</label>
            <input type="date" name="fecha" id="fecha">

            <br></br>
            <label for="">Descripción</label>
            <input type="text" name="descripcion" id="descripcion">

            <br></br>
            <label for="">Nota</label>
            <input type="number" name="nota" id="nota" step="0.1">

            <br></br>
            <button type="submit" name="crearNota" id="crearNota">Crear</button>

            <h3>Mis notas<h3>

                    <table border="1">
                        <tr>
                            <td>ID</td>
                            <td>Asignatura</td>
                            <td>Fecha</td>
                            <td>Descripcion</td>
                            <td>Nota</td>
                            <td>Anulada</td>
                        </tr>

                        <?php
                        foreach ($bd->obtenerNotas() as $n) {
                            echo '<tr>';
                            echo '<td>' . $n->getId() . '</td>';
                            echo'</tr>';
                        }
                        ?>

                    </table>


        </form>
    </body>
<?php
}
?>

    </html>