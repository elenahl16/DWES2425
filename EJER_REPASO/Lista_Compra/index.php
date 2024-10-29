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
            <input type="date" class="form-control" id="fechaCompra" name="fechaCompra" value="<?php echo date('Y-m-d')?>">
        </div>

        </br>

        <div class="col-md-3">
            <label for="">Presupuesto</label>
            <input type="text" class="form-control" id="presupuesto" placeholder="Introduce el presupuesto">
        </div>

        </br>

        <div class="col-md-3">
            <button type="button" class="btn btn-success" name="crear">Crear</button>
        </div>
    </form>
    <?php
    //si el boton ha sido creado
    if(isset($_POST['crear'])){

        //Si estos campos estan vacios, nos mostrara un mensaje de error
        if(empty($_POST['producto']) || empty($_POST['tipoProd']) || empty($_POST['fechaCompra']) || empty($_POST['presupuesto'])){

            echo '<h3 style="color:red;">Error, no puede haber ni un campo vacio</h3>';
        }
        else{
            //si la fecha de compra es posterior o igual
            if(isset($_POST['fechaCompra'])){

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