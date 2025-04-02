<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENTA ENTRADA (EXAMEN REPASO)</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Venta de entrada</legend><br/>
            <label for="nombre">Nombre Completo</label><br/>
            <input type="text" name="nombre" id="nombre" value="<?php echo (!empty($_POST['nombre']) ? $_POST['nombre']:'') ?>"> <br/>     
            <br/>                                                    <!-- Para recordar campo : Si está lleno pinta el nombre sino nada -->


            <label>Tipo de entrada</label><br/>
            <input type="radio" name="tipoEntrada" id="tipoGeneral" value="General" checked="checked"/>     <!-- Para recordar este por defecto-->
            <label for="tipoGeneral">General</label>

            <input type="radio" name="tipoEntrada" id="tipoMayor" value="Mayor 60" <?php 
                echo (isset($_POST['tipoEntrada']) && $_POST['tipoEntrada'] =='Mayor 60' ? 'checked="checked"':'');
            ?>/>     <!-- Para recordar este si el q has marcado es este-->
            <label for="tipoMayor">Mayor de 60</label>

            <input type="radio" name="tipoEntrada" id="tipoMenor" value="Menor 6" <?php 
                echo (isset($_POST['tipoEntrada']) && $_POST['tipoEntrada'] =='Menor 6' ? 'checked="checked"':'');
            ?>/>     <!-- Para recordar este si el q has marcado es este-->
            <label for="tipoMenor">Menor de 6 años</label><br/> 
            <br/>


            <label for="espectaculo">Espectáculo</label><br/>
            <select name="espectaculo" id="espectaculo">
                <option <?php echo(isset($_POST['espectaculo']) && $_POST['espectaculo'] =='Concierto' ? 'selected="selected"':'')?>>Concierto</option> <!-- Para recordar este si el q has marcado es este-->
                <option <?php echo(isset($_POST['espectaculo']) && $_POST['espectaculo'] =='Teatro' ? 'selected="selected"':'')?>>Teatro</option>
                <option <?php echo(isset($_POST['espectaculo']) && $_POST['espectaculo'] =='Magia' ? 'selected="selected"':'')?>>Magia</option>
            </select><br/> 
            <br/>


            <label for="fecha">Fecha</label><br/>
            <input type="date" name="fechaEvento" id="fechaEvento" value="<?php echo(!empty($_POST['fechaEvento'])? $_POST['fechaEvento']:date('Y-m-d')) ?>"> <br/>     
            <br/>                                                           <!-- Para recordar fecha puesta o poner fecha actual si viene vacio-->


            <label for="numEntrada">Número de entrada</label><br/>
            <input type="number" name="numEntrada" id="numEntrada" value="<?php echo (!empty($_POST['numEntrada']) ? $_POST['numEntrada']:'1') ?>"><br/> 
            <br/>                                                          <!-- Para recordar campo : Si está lleno pinta el número sino poner 1 -->


            <label for="descuento">Descuento</label><br/>
            <select name="descuento[]" id="descuento" multiple="multiple"> <br/>     <!-- Para selección multiple-->
                <option <?php echo(isset($_POST['descuento']) && in_array('Familia numerosa',$_POST['descuento'])? 'selected="selected"':'')?>>Familia numerosa</option>
                <option <?php echo(isset($_POST['descuento']) && in_array('Abonado',$_POST['descuento']) ?'selected="selected"':'')?>>Abonado</option>
                <option <?php echo(isset($_POST['descuento']) && in_array('Dia del espectador',$_POST['descuento'])   ? 'selected="selected"':'')?>>Dia del espectador</option>
            </select><br/> 
            <br/>


            <button type="submit" id="comprar" name="comprar">Comprar</button>


        </fieldset>
    </form>
</body>
<?php
//Si hemos pulsado en comprar
if(isset($_POST['comprar'])){

    //aqui lo que hacemos es validar si los campos estan vacios
    if(empty($_POST['nombre']) || !isset($_POST['tipoEntrada']) || !isset($_POST['espectaculo']) || !isset($_POST['fechaEvento']) || empty($_POST['numEntrada'])){
        echo 'Error campo vacio';
    }
    else{
        
        //
        if($_POST['numEntrada']<1 ||$_POST['numEntrada']>4){
            echo "Tiene que estar comprendido entre 1 y 4";
        }
        else{
            //aqui lo que hacemos es compromar si hemos pulsado en la opcion de tipo de entreda mayor 60
            //y pulsa en el descuento en familia numerosa nos muestra un error
            if($_POST['tipoEntrada']=='Mayor 60' && isset($_POST['descuento']) && in_array('famila numerosa',$_POST['descuento'])){
                echo "Mayor de 60 no es compatible con el descuento de familia numerosa";
            }
            else{

                //aqui lo que estamos haciendo es calcular 
                $total=0;
                if($_POST['tipoEntrada']=='General'){
                    $total=10 *($_POST['numEntrada']);

                }elseif($_POST['tipoEntrada']=='Mayor 60'){
                    $total=8 *($_POST['numEntrada']);
                }else{
                    $total=5 *($_POST['numEntrada']);
                }


                //aqui abrimos una etiqueda de cerrar y abrir de php para pintar la tabla con html y esto lo que nos permite
                //es poder escribir dentro de php codigo html y luego podemos seguir escribiendo codigo php
                ?>

                    <table border="1">
                        <tr>
                            <th colspan="2">Ticket de Compra</th>
                        </tr>

                        <tr>
                            <td>Nombre</td>
                            <td><?php echo $_POST['nombre']?></td>
                        </tr>
                        <tr>
                            <td>Tipo de entrada</td>
                            <td><?php echo $_POST['tipoEntrada']?></td>
                        </tr>
                        <tr>
                            <td>Nº de entradas</td>
                            <td><?php echo $_POST['numEntrada']?></td>
                        </tr>
                        <tr>
                            <td>Descuento</td>
                            <td><?php echo (isset($_POST['descuento']) ? implode('/',$_POST['descuento']): 'Ninguno')?></td>
                        </tr>
                    </table>
                <?php
            }
        }
    }

}
?>
</html>|