<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Mis peliculas</title>
</head>
<body>
    <h3>Mis Peliculas Favoritas</h3>
    <form action="" method="post">
    <fieldset>
        <legend>Crear Peliculas</legend>

        <label for="titulo">Titulo de la Película</label>
        <!--Dentro del value lo que hacemos es recordar el campo escrito cuando enviamos el formulario
        lo que queremos decir si no esta vacio el campo titulo, si la condicion es verdadera pintara el nombre
        y si no se queda vacio-->
        <input type="text" name="titulo" id="titulo" value="<?php echo (!empty($_POST['titulo'])?$_POST['titulo']:'')?>"><br/>

        <label for="fechaRegistro">Fecha de Registro</label>
        <!--lo que hacemos es si la fecha no esta vacia, nos muestra la fecha indicada si la condicion se cumple
        si la condicion es falsa nos va a mostrar con date la fecha actual-->
        <input type="date" name="fechaRegistro" id="fechaRegistro" value="<?php echo(!empty($_POST['fechaRegistro']) ? $_POST['fechaRegistro']:date('Y-m-d'))?>"><br/>

        <label for="genero">Genero</label>
        <select name="genero" id="genero" multiple="multiple">
            <option <?php echo(isset($_POST['genero']) && $_POST['genero']=='Accion'?'selected="selected"':'')?>>Accion</option>
            <option <?php echo(isset($_POST['genero']) && $_POST['genero']=='Comedia'?'selected="selected"':'')?>>Comedia</option>
            <option <?php echo(isset($_POST['genero']) && $_POST['genero']=='Drama'?'selected="selected"':'')?>>Drama</option>
            <option <?php echo(isset($_POST['genero']) && $_POST['genero']=='Terror'?'selected="selected"':'')?>>Terror</option>
        </select><br/>

        <label>Tipo</label></br>
        <!--por defecto tiene que salir marcado pelicula le ponemos checked-->
        <input type="radio" id="tipoP" name="tipo" value="pelicula" checked="checked"/>
        <label for="tipoP">Película</label>

        <!--ponemos value cuando son inputs de tipo radio que es por donde vamos a comprobar lo que hemos seleccionado
        lo que hacemos es recordar qie si no esta vacio el tipo y el tipo es igual a serie si se cumple la condicion lo marca y si no se queda vacia-->
        <input type="radio" id="tipoS" name="tipo" value="serie" <?php echo(isset($_POST['tipo']) && $_POST['tipo']=='serie'?'checked="checked"':'')?>/>
        <label for="tipoS">Serie</label></br>
        
        <label for="numP">Nº de Peliculas</label>
        <input type="text" name="numP" id="numP" value="<?php echo(!empty($_POST['numP'])?$_POST['numP']:'')?>"/></br>
     
        <button type="submit" id="guardar" name="guardar">Guardar</button>
    </fieldset>
    </form>

    <?php
    if(isset($_POST['guardar'])){

        //validamos de que ningun campo puede estar vacio
        if(empty($_POST['titulo']) || empty($_POST['fechaRegistro']) ||empty($_POST['numP'])){
            echo "Error no puede haber ningun campo vacio";
        }
        else{
            if($_POST['tipo']=='serie'){
                $_POST['numP']>1;
            }
        }

    }
    ?>
</body>
</html>