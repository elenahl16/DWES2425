<?php
require_once "datos.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <h1>Calendario de Eventos</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    Fecha
                    <br>
                    <input type="date" name="fecha" id="fecha"/></br>
                </td>
                
                <td>
                    Hora
                    <br>
                    <input type="time" name="hora" id="hora"/></br>   
                </td>
                <td>
                    Asunto
                    <br>
                    <input type="text" name="asunto" id="asunto" placeholder="Asunto"/></br>
                </td>
                </tr>
        </table>
        <input type="submit" name="crear" value="Añadir"/>
        <input type="submit" name="borrar" value="Borrar"/>
    </form>
</body>

<?php
//validamos que se han introducido datos
    if(isset($_POST["crear"])){
        
        //si estan rellano los datos
        if(!empty($_POST['fecha']) || !empty($_POST['hora']) || !empty($_POST['fecha'])){
            $datosEvent= new Datos();

        }

    }else{
        echo "No puede a ver ningun campo vacio";
    }

?>
</html>