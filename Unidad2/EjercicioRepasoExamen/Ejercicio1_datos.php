<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>
<?php
//Si hemos pulsado el botón enviar
if(isset($_POST["Enviar"])){

    //guardamos los datos en un array asociativo
    $datos=array();
    $datos["tipoCliente"]=$_POST["tipoCliente"];
    $datos["nombreC"]=$_POST["nombreC"];
    $datos["Email"]=$_POST["email"];
    $datos["TipoMotor"]=$_POST["tipoM"];
    
    //si ha sido enviado el climatizador
    if(isset($_POST["climatizador"])){
        $datos["Climatizador"]=$_POST["climatizador"];
       
    }
    
    if(isset($_POST["gps"])){
        $datos["gps"]=$_POST["gps"];
    }

    if(isset($_POST["camara"]) ){
        $datos["camara"]=$_POST["camara"];
     }

     $datos["ModeloCoche"]=$_POST["modelo"];
     $datos["Precio"]=$_POST["rpecio"];

     //una vez metido los datos en un array lo tenemos que mostrar en una table

?>
<table border="1">
<?php
foreach($datos as $clave=>$valor){
    echo "<tr>
    <td>$clave</td>
    <td>$valor</td>
    </tr>";
}
?>
<?php
}
else{
    echo "<h2>Debes rellenar el formulario</h2>";
}
?>
</table>
</body>
</html>