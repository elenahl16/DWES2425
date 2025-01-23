<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión ONG</title>
</head>

<body>
    <div>
        <h1 style='color:red;'>Mensajes</h1>
        <?php
        //aqui mostramos los mensajes de error donde verifica si mensaje esta  definida y no es null 
        //se mostrara el mensaje de error y si no mostrara una cadena vacia
         echo (isset($mensaje)? $mensaje:'')
         ?>
    </div>
    <!-- Formulario para seleccionar un centro -->
    <form action="" method="post">
        <label for="centro">Centro:</label>
        <select name="centro" id="centro">
            <?php
            ?>
        </select>
        <button type="submit" name="seleccionarC">Seleccionar</button>
    </form>


    <!-- Datos del centro -->
    <form action="" method="post">
        <h3>
            Nombre del centro - Localidad
            <button type="submit" name="cambiarC">Cambiar Centro</button>
        </h3>
    </form>
    <!-- Formulario para asignar gestionar beneficiarios -->
    <form action="" method="post">
        <div>
            <label for="usuario">Beneficiario</label><br />
            <select name="beneficiario" id="beneficiario">
            </select>
            <button type="submit" name="verSP">Ver Servicios Prestados</button>
            <button type="submit" name="borrarB">Borrar Beneficiario</button>
        </div>
        <p />
        <div>
            <label for="usuario">Servicio</label><br />
            <select name="servicio" id="servicio">
            </select>
        </div>
        <p />
        <div>
            <button type="submit" name="asignarS">Asignar</button>
        </div>
    </form>
</body>

</html>