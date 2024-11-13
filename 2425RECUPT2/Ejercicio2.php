<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>

<body>
    <h2>Cultura Navalmoral</h2>

    <form action="" method="post">
        <fieldset>
            <legend>Venta de entradas</legend>
            <div>
                <label>Nombre Completo</label><br/>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo"
                 value="<?php 
                    echo (isset($_POST['nombre'])?$_POST['nombre']:'')
                ?>"/>
            </div>
            </br>

            <div>
                <label for="tipos">Tipo Entrada</label><br />
                <input type="radio" id="general" name="tipos[]" value="general" checked="checkded"/>
                <label>General</label>

                <input type="radio" id="mayor" name="tipos[]" value="mayor" />
                <label>Mayor de 60</label>

                <input type="radio" id="menor" name="tipos[]" value="menor" />
                <label>Menor de 6</label>
            </div>
            </br>

            <div>
                <label>Fecha del Evento</label><br/>
                <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d')?>"/>
            </div>
            </br>

            <div>
                <label>Número de Entradas:</label><br/>
                <input type="number" id="entradas" name="entradas"  value="<?php 
                echo (isset($_POST['importe'])?$_POST['importe']:1)
                ?>"/>
            </div>
            </br>
            <div>
                <label>Descuento</label><br/>
                <select name="descuentos" id="descuentos">
                    <option>Familia Numerosa</option>
                    <option selected="selected">Abonado</option>
                    <option selected="selected">Día del Espectador</option>
                </select>
            </div>
            </br>
            <div>
                <input type="submit" name="comprar" value="comprar"/>
            </div>
        </fieldset>
    </form>
    <?php
    //si se ha pulsado el boton guardar
    if(isset($_POST['comprar'])) {

        //Hacemos las validaciones

        //si los campo nombre, fecha,tipos y entrada estan vacios
        if(empty($_POST['nombre']) or empty($_POST['tipos']) or empty($_POST['fecha']) or empty($_POST['entradas'])){
            echo '<h3 style="color:red;">Error, no puede haber ni un campo vacio</h3>';
            $error=true;
        }
        
        if(isset($_POST['entradas']) and $_POST['entradas']>=1 and $_POST['entradas']<=4 ){
            echo '<h3 style="color:red;">Error, el numero de entrada tiene que estar comprendido entre 1 y 4 </h3>';
            $error=true;
        }

        if(isset($_POST['tipos'])=='mayor' and $_POST['tipos']){

        }

        if(!isset($error)){
            //Aqui mostramos la tabla con los datos introducidos


            echo '<h2>Ticket de Compra</h2>';
            echo '<h3>Nombre:'.$_POST['nombre'].'</h3>';
            echo '<h3>Tipo de entrada:'.$_POST['tipos'].'</h3>';
        
            
        }
    }
    ?>
</body>

</html>