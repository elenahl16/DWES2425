<?php
require_once "Modelo.php";
require_once "Trabajo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <h1>Tintorería La Morada</h1>

    <form action="" method="post">
        <fieldset>
            <div>
                <label for="fecha_entrada">Fecha de entrada</label></br>
                <input type="date" id="fecha_entrada" name="fecha_entrada" value=" <?php echo date('Y-m-d') ?>"></input>
                <br></br>
            </div>

            <div>
                <label form="nombreC">Cliente</label>
                <input type="text" name="nombreC" id="nombreC" placeholder="Nombre del Cliente"></input>
            </div>

            <div>
                <label>Tipo de Prenda</label>
                <select name="tipoPrenda">
                    <option selected="selected">Textil</option>
                    <option>Fiesta</option>
                    <option>Cuero</option>
                    <option>Hogar</option>
                </select>
            </div>

            <div>
                <label>Servicio</label></br>
                <label form="limpieza">Limpieza</label></br>
                <input type="checkbox" id="limpieza" name="servc[]" value="limpieza">Limpieza</input>

                <label form="planchado">Planchado</label></br>
                <input type="checkbox" id="planchado" name="servc[]" value="planchado">Planchado</input>

                <label form="desmanchado">Desmanchado</label></br>
                <input type="checkbox" id="desmanchado" name="servc[]" value="desmanchado">Desmanchado</input>
                <br></br>
            </div>

            <div>
                <label form="importe">Importe</label></br>
                <input type="number" name="importe" placeholder="Precio"></input>
                <br></br>
            </div>
            <input type="submit" name="guardar" value="Guardar"></input>
    </form>
    </fieldset>
</body>
<?php
//comprobamos si se a pulsado a guardar
if (isset($_POST['guardar'])) {

    //si  el campo fecha, nombreC,tipoPrenda y importe esta vacio nos muestra un mensaje de error
    if (empty($_POST["fecha_entrada"]) || empty($_POST["nombreC"]) || empty($_POST["tipoPrenda"]) || empty($_POST["importe"])) {

        echo "Tienes que rellenar todos los datos";
        $error = true;
    }
    if (isset($_POST['servc']) or sizeof($_POST('serv')) < 1) {
        echo 'Al menos debes marcar un servicio';
        $error = true;
    }
    if (isset($_POST['tipo']) and $_POST['tipo'] == 'cuero' and isset($_POST['servc'])) {
        //con in_array se haria asi -> in_array('Planchado),$_POST['serv'] habria que ponerlo despues 

        foreach ($_POST['serv'] as $s) {

            if ($s == 'planchado') {
                echo 'No puedes seleccionar Cuero y planchado';
                $error = true;
                break;
            }
        }
    }

    if (isset($_POST['tipo']) and $_POST['tipo'] == 'Fiesta' and isset($_POST['Importe']) and $_POST['Importe'] <= 50) {
        echo 'El importe  en prendas de fiesta debe ser > 50';
        $error = true;
    }

    if (!$error) { //aqui decimos que si el error es falso mostramos todos los datos introducidos

        echo '<h2>Datos Correctos</h2>';
        echo '<h2>Prenda:' . $_POST['tipo'] . '</h2>';
        echo '<h2>Servicio:' . implode('/', $_POST['tipo']) . '</h2>';

        //Creamos los objetos de la clase modelo y trabajo dentro del objeto trabajo hay que añadirle los parametros
        $m = new Modelo();
        $t = new Trabajo(
            $_POST['fecha'],
            $_POST['nombreC'],
            $_POST['tipoPrenda'],
            $_POST['servc'],
            $_POST['importe']
        );
    }
}
?>
</html>