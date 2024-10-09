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
    <input type="date" name="fecha_entrada" id="fecha_entrada" value="<?php echo date('Y-m-d', strtotime('2024-10-08')) ?>"></input>
    <br></br>

    <label form="nombreC">Cliente</label>
    <input type="text" name="nombreC" placeholder="Nombre del Cliente"></input>
    <br></br>

    <label>Tipo de Prenda</label>
        <select name="tipoPrenda">
            <option>Textil</option>
            <option>Fiesta</option>
            <option>Cuero</option>
            <option>Hogar</option>
        </select>

        <br></br>
        <label form>Servicio</label></br>
            <label form="limpieza">Limpieza</label></br>
                <input type="checkbox" name="servc[]" value="limpieza" value="checked">Limpieza</input>
            <label form="planchado">Limpieza</label></br>
                <input type="checkbox" name="servc[]" value="planchado" value="checked">Planchado</input>
            <label form="desmanchado">Limpieza</label></br>
                <input type="checkbox" name="servc[]" value="desmanchado" value="checked">Desmanchado</input>
        <br></br>
    
        <label form="importe">Importe</label></br>
        <input type="number" name="importe" placeholder="Precio"></input>
        <br></br>
        
        <input type="submit" name="guardar" value="Guardar"></input>

    </form>
</body>
<?php
    //comprobamos si han pulsado a guardar
    if(isset($_POST['guardar'])){

        //si  el campo fecha, nombreC,tipoPrenda y importe esta vacio nos muestra un mensaje de error
        if(empty($_POST["fecha_entrada"]) ||empty($_POST["nombreC"]) ||empty($_POST["tipoPrenda"]) ||empty($_POST["importe"])){

            echo "Tienes que rellenar todos los datos";
        }else if(isset($_POST['servc'])){
            $variebale = sizeof($_POST['servc']);
            if($variebale<1){

            }

        }
        else{

            $datos["fecha_entrada"]=$_POST['fecha_entrada'];
            $datos["nombreC"]=$_POST['nombreC'];
            $datos["tipoPrenda"]=$_POST['tipoPrenda'];
            $datos["importe"]=$_POST['importe'];
        }
    
        
    }

?>
</html>