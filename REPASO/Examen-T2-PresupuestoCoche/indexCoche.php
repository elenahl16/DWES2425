<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto de Coche</title>
</head>

<body>
    <h3>Presupuesto de Coche</h3>
    <form action="" method="post">

        <label>Tipo de Cliente</label></br>
        <select name="tipoCliente" id="tipoCliente">
            <option>empresa</option>
            <option>particular</option>
            <option>organimos publico</option>
        </select></br>

        <label>Nombre del Cliente</label>
        <input type="text" name="nombre" id="nombre"></br>

        <label>Email del Cliente</label></br>
        <input type="email" name="nombre" id="nombre"></br>

        <label>Tipo de motor</label></br>
     
        <input type="radio" id="tipoD" name="tipoMotor" value="diesel"/>
        <label for="tipoP">Diesel</label>

        <input type="radio" id="tipoG" name="tipoMotor" value="gasolina">
        <label for="tipoS">Gasolina</label>

        <input type="radio" id="tipoE" name="tipoMotor" value="electrico">
        <label for="tipoS">Electrico</label></br>


        <label>Opciones</label></br>
     
        <input type="checkbox" id="climatizador" name="opciones" value="climatizador"/>
        <label for="tipoP">Climatizador</label>

        <input type="checkbox" id="gps" name="opciones" value="gps">
        <label for="tipoS">GPS</label>

        <input type="checkbox" id="electrico" name="opciones" value="electrico">
        <label for="tipoS">Electrico</label></br>

        <label>Selecciona Vehiculo</label></br>
        <select name="vehiculo" id="vehiculo">
            <option>for focus</option>
            <option>citroen</option>
            <option>peugot</option>
        </select></br>


        <label>Precio €</label></br>
        <input type="text" name="precio" id="precio"></br>

        <label>Selecciona Vehiculo</label></br>
        <select name="vehiculo" id="vehiculo">
            <option>Plan Renove (-2000)</option>
            <option>Plan Green Energy (-2500)</option>
            <option>Sin promocion</option>
        </select></br>
        
        <button type="submit" name="enviar" id="enviar">Enviar</button>


    </form>
</body>

</html>