<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>
<body>
    <h2>Mis Peliculas Favoritas</h2>
    <form action="" method="$_POST">
        <fieldset>
            <legend>Crear Peliculas</legend>
            <div>
                <label for="titulo">Titulo de Pelicula</label><br />
                <input type="text" id="titulo" name="titulo" placeholder="Titulo de pelicula" />
            </div>
            <div>
                <label for="fecha">Fecha Entrada</label><br />
                <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d') ?>" />
            </div>

            <div>
                <label for="genero">Género</label><br />
                <select name="genero" id="genero">
                    <option>Comedia</option>
                    <option>Drama</option>
                    <option>Terror</option>
                    <option>Adventura</option>
                </select>
            </div>

            <div>
            <label>Tipo</label><br />
                <input type="radio" id="pelicula" name="pelicula" value="pelicula" />
                <label for="pelicula">Pelicula</label>
                <input type="radio" id="serie" name="serie" value="serie" />
                <label for="serie">Serie</label>
            </div>
            <div>
                <label for="capitulo">Nº de Capitulo</label><br />
                <input type="text" id="capitulo" name="capitulo" placeholder="Numeri de pelicula" />
            </div>
            <div>
                <input type="submit" name="guardar" value="guardar"/>
            </div>
        </fieldset>
    </form>
    <?php
//si se ha pulsado el boton guardar
if(isset($_POST['guardar'])){

    //Hacemos las validaciones
    //si el campo titulo,fecha,numero capitulo esta vacio nos muestra un mensaje diciendo que hay que rellenar todos los datos
    if (empty($_POST['titulo']) or empty($_POST['fecha']) or empty($_POST['capitulo'])) {
        echo 'Rellena fecha, nombre, tipo e importe';
        $error=true;
    }
}






    ?>
</body>
</html>