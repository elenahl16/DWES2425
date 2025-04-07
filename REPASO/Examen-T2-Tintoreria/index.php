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
            <input type="date" name="fechaEntrada" id="fechaEntrada" value="<?php echo(!empty($_POST['fechaEntrada'])?$_POST['fechaEntrada']:date('Y-m-d'))?>"><br>

            <label for="cliente">Cliente</label>
            <input type="text" name="cliente" id="cliente" value="<?php echo(!empty($_POST['cliente'])?$_POST['cliente']:'') ?>"><br>

            <label for="tipoPrenda">Tipo de Prenda</label>
            <select name="tipoPrenda" id="tipoPrenda">
                <option <?php echo(isset($_POST['tipoPrenda']) && $_POST['tipoPrenda'] == 'fiesta' ? 'selected="selected"':'')?>>fiesta</option>
                <option <?php echo(isset($_POST['tipoPrenda']) && $_POST['tipoPrenda'] == 'cuero' ? 'selected="selected"':'')?>>cuero</option>
                <option <?php echo(isset($_POST['tipoPrenda']) && $_POST['tipoPrenda'] == 'hogar' ? 'selected="selected"':'')?>>hogar</option>
                <option <?php echo(isset($_POST['tipoPrenda']) && $_POST['tipoPrenda'] == 'textil' ? 'selected="selected"':'')?>>textil</option>
            </select>
            </br>

            <label>Servicio</label></br>

            <input type="checkbox" name="servicio[]" id="limpieza" value="limpieza">
            <label for="limpieza">Limpieza</label>

            <input type="checkbox" name="servicio[]" id="planchado" value="planchado">
            <label for="planchado">Planchado</label>

            <input type="checkbox" name="servicio[]" id="desmanchado" value="desmanchado">
            <label for="desmanchado">Desmanchado</label></br>

            <label>Importe</label></br>
            <input type="number" name="importe" id="importe">

            </br>

            <button type="submit" name="guardar" id="guardar">Guardar</button>

        </form>
    </fieldset>
</body>

</html>