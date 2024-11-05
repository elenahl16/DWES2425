<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <p class="display-4">Lista de la Compra</p>
    <form action="" method="post">

        <div class="col-md-3">
            <label for="">Producto</label>
            <input type="text" class="form-control" id="producto" name="producto" placeholder="Introduce un Producto">
        </div>

        </br>
        <div class="col-md-3">
            <label for="">Tipo de Productos</label>
            <select class="custom-select" id="tipoProd" name="tipoProd">
                <option>Ocio</option>
                <option>Alimentación</option>
                <option>Textil</option>
                <option>Otros</option>
            </select>
        </div>
        </br>

        <div class="col-md-3">
            <label for="">Fecha Compra</label>
            <input type="date" class="form-control" id="fechaCompra" name="fechaCompra" value="<?php echo date('Y-m-d') ?>">
        </div>

        </br>

        <div class="col-md-3">
            <label for="">Presupuesto</label>
            <input type="text" class="form-control" id="presupuesto" name="presupuesto" placeholder="Introduce el presupuesto">
        </div>

        </br>

        <div class="col-md-3">
            <button type="submit" class="btn btn-success" name="crear">Crear</button>
        </div>
    </form>
    <?php
    //si el boton ha sido creado
    if (isset($_POST['crear'])) {

        $error=false;

        //Si estos campos estan vacios, nos mostrara un mensaje de error
        if (empty($_POST['producto']) || empty($_POST['tipoProd']) || empty($_POST['fechaCompra']) || empty($_POST['presupuesto'])) {
            echo '<h3 style="color:red;">Error, no puede haber ni un campo vacio</h3>';

            $error=true;

        }
        
        else {
            // echo $_POST['fechaCompra']; //con esto lo que hacemos es mostrar lo que tiene la variable fecha compra

            if (isset($_POST['fechaCompra']) && $_POST['fechaCompra'] < date('Y-m-d')) {
                //c
                echo 'No se puede comprar con fecha anterior al dia de hoy';
                $error=true;
            }


            //si el presupuesto es menor que 0
            if (isset($_POST['presupuesto']) && $_POST['presupuesto'] <= 0) {
                echo '<h3 style="color:red;">Error, no puede ser menor que 0</h3>';
                $error=true;
            }

            //si el tipo de producto es igual a ocio, avisamos a los padres
            if ($_POST['tipoProd'] == 'Ocio') {
                echo 'Este producto es de ocio, avisar a los padres';
            }


             if(!$error){ //aqui decimos que si el error es falso seguimos
                
                //añadimos los datos a una variable para poder mostrarlos si todo esta ok
                $producto = $_POST['producto'];
                $tipoProducto = $_POST['tipoProd'];
                $fechaCompra = $_POST['fechaCompra'];
                $presupuesto = $_POST['presupuesto'];

                //Mostramos todos los datos guardados a traves de 

                echo "<h4>Datos ingresados:</h4>";
                echo "<p>Producto: $producto</p>";
                echo "<p>Tipo: $tipoProducto</p>";
                echo "<p>Fecha de Compra: ". $fechaCompra ."</p>";
                echo "<p>Presupuesto: $presupuesto </p>";

                //iNSERTA EL PRODUCTO EN LA BD

                //Crear objeto del modelo
                //Comprobar que hay conexión

                //crear objeto compra
                //creas registro en bd

            
            }

         
        }
    }

    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>