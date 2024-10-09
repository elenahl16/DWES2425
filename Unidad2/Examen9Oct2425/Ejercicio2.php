<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head> 
<body>
    <h1>Registrar Trabajo</h1>

    <form action="" method="post">
    <label form="fecha_entrada">Fecha de entrada</label></br>
    <input type="date" name="fecha_entrada" id="fecha_entrada"></input>
    <br></br>

    <label form="nombreC">Cliente</label>
    <input type="text" name="nombreC" placeholder="Nombre del Cliente"></input>
    <br></br>

    <label form="tipoPrenda">Tipo de Prenda</label>
        <select name="tipoPrenda">
            <option>Fiesta</option>
            <option>Cuero</option>
            <option>Hogar</option>
            <option>Textil</option>
        </select>

        <br></br>
        <label>Servicio</label></br>
        <input type="checkbox" name="limpieza" value="limpieza">Limpieza</input>
        <input type="checkbox" name="planchado" value="planchado">Planchado</input>
        <input type="checkbox" name="desmanchado" value="desmanchado">Desmanchado</input>
        <br></br>
    
        <label form="importe">Importe</label></br>
        <input type="number" name="importe" placeholder="Precio"></input>
        <br></br>
        
        <input type="submit" name="guardar" value="Guardar"></input>

    </form>
</body>
<?php
    //comprobamos si han pulsado a guardar
    if(isset($_POST['Guardar'])){

        //si  el campo fecha, nombreC,tipoPrenda y importe esta vacio nos muestra un mensaje de error
        if(empty($_POST["fecha_entrada"]) ||empty($_POST["nombreC"]) ||empty($_POST["tipoPrenda"]) ||empty($_POST["importe"])){
            echo "Tienes que rellenar todos los daots";
        }
        else{
        echo "Fecha de Entrada:".$_POST['fecha_entrada'];
        echo "Nombre Cliente:".$_POST['nombreC'];
        echo "Prenda:".$_POST['tipoPrensa'];
        }
        
        
    }

?>
</html>