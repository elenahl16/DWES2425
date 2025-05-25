<?php
require_once 'Modelo.php';
require_once 'controlador.php';

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mis Notas</title>
    </head>

    <body>
        <h1>Mis notas</h1>
        <h3>
            <?php
            //* aqui lo que hacemos es una condición donde si seleccionamos el mensaje y si la condicio se cumple nos muestra
            //* el mensaje  y si
            echo (isset($mensaje) ? $mensaje : '')
            ?>
        </h3>
        <form action="" method="post">
            <select name="asignatura" id="asignatura">

                <?php
               
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
        </form>
    </body>
<?php

?>
</html>