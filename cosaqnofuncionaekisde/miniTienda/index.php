<?php
    require_once 'AccessoDatos.php';

    //creamos una instancia (una instancia es un objeto) de acceso a los datos
    $ad = new AccesoDatos('ventas.txt');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="#" method="post">

    <div>
    <label for="producto">Selecciona Producto</label></br>
    <select name="producto" id="producto">
        <option>Camiseta - 21 </option>
        <option>Pitillos - 25 </option>
        <option>Chaqueta - 31 </option>
        <option>Zapatos - 15 </option>
    </select>
    </div>

    <div>
        <label for="cantidad">Cantidad</label></br>
        <input type="number" name="cantidad" id="cantidad" value="1"/>
    </div>
        <input type="submit" name="enviar" value="Añadir"/>
    </form>

    <?php
   if(isset($_POST['enviar'])){
        //Creamos un objeto de la clase ticket

        $datosPoducto= explode('-', $_POST['producto']);
        $t = new Ticket($datosPoducto[0],$datosPoducto[1],$_POST['cantidad']);

        //Introducimos el ticket en la venta
        $ad-> insertarProducto($t);

        //Recuperar lo que hay en el ficheroy pintarlo en una tabla
        echo '<h3> Productos </h3>';
        echo '<table>';
        echo '<tr><th>Producto</th><th>Precio U</th><th>Cantidad</th><th>Total</th></tr>';
        //Creamos un array y lo rellenamos con todos los productos del fichero 
        //el array va a contener objetos productos

        $productos = $ad -> obtenerProducto();

        foreach($productos as $p){
            echo '<tr>';
            echo '<td>', $p->getProducto(),'</td>';
            echo '<td>', $p->getPrecio(),'</td>';
            echo '<td>', $p->getCantidad(),'</td>';
            echo '<td>', $p->getTotal(),'</td>';
            echo '</tr>';
        }

        echo '</table>';
   }
    ?>
    
</body>
</html>