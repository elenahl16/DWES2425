<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
</head>

<body>
    <h3>Formulario Reserva</h3>
    <form action="" method="post">
        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo (!empty($_POST['nombre']) ? $_POST['nombre'] : '') ?>"></br>

        <label>Fecha</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo (!empty($_POST['fecha']) ? $_POST['fecha'] : date('Y-m-d')) ?>"></br>

        <label>Hora</label>
        <input type="time" name="hora" id="hora" value="<?php echo (!empty($_POST['hora']) ? $_POST['hora'] : date('H:i')) ?>"></br>

        <label>Número de Persona</label>
        <input type="number" name="numPersona" id="numPersona" value="<?php echo (!empty($_POST['numPersona']) ? $_POST['numPersona'] : '') ?>"></br>

        <label>Zona Preferida</label>
        <select name="zona" id="zona">
            <option <?php echo (isset($_POST['zona']) && $_POST['zona'] == 'interior' ? 'selected="selected"' : '') ?>>interior</option>
            <option <?php echo (isset($_POST['zona']) && $_POST['zona'] == 'terraza' ? 'selected="selected"' : '') ?>>terraza</option>
            <option <?php echo (isset($_POST['zona']) && $_POST['zona'] == 'reservado' ? 'selected="selected"' : '') ?>>reservado</option>
        </select></br>

        <label>Reserva para:</label></br>

        <input type="radio" name="reserva" id="menu" value="menu" <?php echo (isset($_POST['reserva']) && $_POST['reserva']=='menu' ?'checked="checked"' : '') ?>>
        <label>Menu</label>

        <input type="radio" name="reserva" id="carta" value="carta" <?php echo (isset($_POST['reserva']) && $_POST['reserva']=='carta' ?'checked="checked"' : '') ?>>
        <label>Carta</label></br>


        <label>Preferencias alimentarias</label></br>

        <input type="checkbox" name="preferAlimentaria[]" id="vegano" value="vegano">
        <label for="">vegano</label>

        <input type="checkbox" name="preferAlimentaria[]" id="celiaco" value="celiaco">
        <label for="">celiaco</label>

        <input type="checkbox" name="preferAlimentaria[]" id="sinLactosa" value="sinLactosa">
        <label for="">Sin Lactosa</label></br>

        <button type="submit" name="reservar" id="reservar">Reservar</button>
        <button type="submit" name="borrar" id="borrar">Borrar</button>


    </form>

    <?php
    if(isset($_POST['reservar'])){

        if(empty($_POST['nombre']) || empty($_POST['fecha']) || empty($_POST['hora']) || empty($_POST['numPersona']) || !isset($_POST['zona']) || !isset($_POST['reserva'])){
            echo "<h3 style='color:red'>Error, no puede haber ningun campo vacio</h3>";

        }elseif(isset($_POST['zona']) && $_POST['zona']=='terraza' && isset($_POST['reserva']) && $_POST['reserva']=='menu'){
            echo "<h3 style='color:red'>Error, no se puede seleccionar a la vez terraza y menu</h3>";

        }elseif(isset($_POST['reserva']) && $_POST['reserva']=='menu' && isset($_POST['preferAlimentaria']) && in_array('sinLactosa', $_POST['preferAlimentaria'])){
            echo "<h3 style='color:red'>Error, no se puede seleccionar a la vez menu y sin lactosa</h3>";

        }elseif(isset($_POST['numPersona']) && $_POST['numPersona'] < 2){
            echo "<h3 style='color:red'>Error, el numero de persona no puede ser menor que 2</h3>";

        }elseif(isset($_POST['numPersona']) && $_POST['numPersona'] >= 8 && isset($_POST['zona']) && $_POST['zona']=='terraza'){
            echo "<h3 style='color:red'>Error, no se puede reservar terraza si el numero de persona es mayor que 8</h3>";

        }else{
            //si no hay errores, guardamos los datos en la tabla
            ?>
            <table border="1px solid black">
                <tr>
                    <th>Nombre</th>
                    <th>Fecha Reserva</th>
                    <th>Hora</th>
                    <th>Nº de Persona</th>
                    <th>Zona</th>
                    <th>Reserva para</th>
                    <th>Preferencias Alimentarias</th>
                </tr>
                <tr>
                    <th><?php echo $_POST['nombre']?></th>
                    <th><?php echo $_POST['fecha']?></th>
                    <th><?php echo $_POST['hora']?></th>
                    <th><?php echo $_POST['numPersona']?></th>
                    <th><?php echo $_POST['zona']?></th>
                    <th><?php echo $_POST['reserva']?></th>
                    <th><?php echo (isset($_POST['preferAlimentaria'])?implode(',',$_POST['preferAlimentaria']):'No hay preferencia')?></th>
                </tr>
            </table>

            <?php
        }

    }

    ?>
</body>

</html>