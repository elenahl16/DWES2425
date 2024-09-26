<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Personal</title>
</head>
<body>
    <h2>Agenda Personal</h2>

<form action="#" method="post" enctype="multipart/form-data">
 <div>
    <label for="nombre">Nombre</label></br>
    <input type="text" name="nombre" id="nombre" value="<?php echo (isset($_POST['nombre']) ?$_POST['nombre']:'') ?>"/></br>
 </div>
 <div>
    <label for="telefono">Telefono</label></br>
    <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}"
    value="<?php echo (isset($_POST['telefono']) ?$_POST['telefono']:'') ?>"/>
</div>
<div>
    <label>Tipo</label></br>
    <label for="amigo">Amigo</label>
    <input type="radio" id="amigo" name="tipo" value="amigo" checked="checked"/>

    <label for="familia">Familia</label>
    <input type="radio" id="familia" name="tipo" value="familia"
    <?php echo ((isset($_POST['tipo']) and $_POST['tipo'] == 'familia') ? 'checked="checked"':'')?>/>
    
    <label for="otros">Otros</label>
    <input type="radio" id="otros" name="tipo" value="otros"
    <?php echo ((isset($_POST['tipo']) and $_POST['tipo'] == 'otros') ? 'checked="checked"':'')?>/>
 </div>
 <div>
    <label for="fotos">Fotos</label>
    <input type="file" name="fotos" id="fotos"/>
 </div>
 
    <input type="submit" value="Crear" name="crear">

    </form>
    <?php

    if(isset($_POST['crear'])){
        if(empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_FILES['fotos']['name']) || empty($_POST['tipo'])){

            echo '<h3 style="color:red;">Error, hay campos vacíos</h3>';

        }
    }

    ?>
</body>
</html>