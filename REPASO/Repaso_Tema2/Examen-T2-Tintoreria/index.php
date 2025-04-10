<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Tintoreria</title>
</head>

<body>
    <h3>Tintoreria La morada</h3>
    <fieldset>
        <legend>Registrar Trabajo </legend>

        <form action="" method="post">

            <!-- aqui lo que decimos si esta rellena la fecha entrada, si la condicion es verdadera nos muestra la fecha y si no nos pone la fecha actual-->
            <label for="fechaEntrada">Fecha Entrada</label>
            <input type="date" name="fechaEntrada" id="fechaEntrada" value="<?php echo (!empty($_POST['fechaEntrada']) ? $_POST['fechaEntrada'] : date('Y-m-d')) ?>"><br>

            <!-- aqui lo que decimos si esta rellena el cliente, si la condicion es verdadera nos muestra el nombre del cliente y si no lo deja vacio-->
            <label for="cliente">Cliente</label>
            <input type="text" name="cliente" id="cliente" value="<?php echo (!empty($_POST['cliente']) ? $_POST['cliente'] : '') ?>"><br>

            <!-- aqui lo que decimos si seleccionamos la prenda y es de tipo fiesta, si la condicion es verdadera nos selecciona el tipo de prenda y si no nos lo deja en vacio
               al ser de tipo select es mas corrector que utilicemos un isset-->
            <label for="tipoPrenda">Tipo de Prenda</label>
            <select name="tipoPrenda" id="tipoPrenda">
                <option <?php echo (isset($_POST['tipoPrenda']) && $_POST['tipoPrenda'] == 'fiesta' ? 'selected="selected"' : '') ?>>fiesta</option>
                <option <?php echo (isset($_POST['tipoPrenda']) && $_POST['tipoPrenda'] == 'cuero' ? 'selected="selected"' : '') ?>>cuero</option>
                <option <?php echo (isset($_POST['tipoPrenda']) && $_POST['tipoPrenda'] == 'hogar' ? 'selected="selected"' : '') ?>>hogar</option>
                <option <?php echo (isset($_POST['tipoPrenda']) && $_POST['tipoPrenda'] == 'textil' ? 'selected="selected"' : '') ?>>textil</option>
            </select>
            </br>

            <label>Servicio</label></br>

            <input type="checkbox" name="servicio[]" id="limpieza" value="limpieza" <?php echo (isset($_POST['servicio']) && in_array('limpieza', $_POST['servicio']) ? 'checked="checked"' : '') ?>>
            <label for="limpieza">Limpieza</label>

            <input type="checkbox" name="servicio[]" id="planchado" value="planchado" <?php echo (isset($_POST['servicio']) && in_array('planchado', $_POST['servicio']) ? 'checked="checked"' : '') ?>>
            <label for="planchado">Planchado</label>

            <input type="checkbox" name="servicio[]" id="desmanchado" value="desmanchado" <?php echo (isset($_POST['servicio']) && in_array('desmanchado', $_POST['servicio']) ? 'checked="checked"' : '') ?>>
            <label for="desmanchado">Desmanchado</label></br>

            <label>Importe</label></br>
            <input type="number" name="importe" id="importe" value="<?php echo (!empty($_POST['importe']) ? $_POST['importe'] : '') ?>">

            </br>

            <button type="submit" name="guardar" id="guardar">Guardar</button>

        </form>
    </fieldset>
    <?php
    //si hemos pulsado en guardar
    if (isset($_POST['guardar'])) 
    {

        //validamos que si los campos estan vacios nos muestra un mensaje de error
        if (empty($_POST['fechaEntrada']) || empty($_POST['cliente']) || empty($_POST['tipoPrenda']) || empty($_POST['importe'])) {
            echo '<h3 style="color:red;">Error, hay campos vacíos</h3>';
        }
        elseif(!isset($_POST['servicio'])){ //si no esta seleccionado ningun servicio nos da un mensaje de error
            echo '<h3 style="color:red;">Error, debes marcar por lo menos un servicio</h3>';

        }elseif(isset($_POST['tipoPrenda'])&& $_POST['tipoPrenda'] == 'cuero' && in_array('planchado',$_POST['servicio'])){
            echo '<h3 style="color:red;">Error, no se puede seleccionar a la vez el cuero y el planchado</h3>';


        }elseif(isset($_POST['tipoPrenda']) && $_POST['tipoPrenda']=='fiesta' && isset($_POST['importe']) && $_POST['importe']<50){
            echo '<h3 style="color:red;">Error, el minimo de la prenda de fiesta debe ser mayor de 50</h3>';
        }
        else{
            //No hay errores, mostramos la tabla en html para eso ponemos el cierre de php y la apertura para poder escribir
            ?>
            <div style="border: 1px solid black;">
                <h3>Datos Correctos</h3>
                <p>Prenda: <?php echo ($_POST['tipoPrenda'])?></p>
                <p>Servicio:<?php echo (isset($_POST['servicio']) ? implode('/', $_POST['servicio']) : 'Ninguno')?></p>
            </div>
            <?php
            
        }

    }
    ?>
</body>

</html>