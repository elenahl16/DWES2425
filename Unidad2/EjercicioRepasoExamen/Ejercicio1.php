<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h3>Presupuesto de compra de vehiculo</h3>
    <form action="Ejercicio1_datos.php" method="post">
        <label>Tipo de Cliente</label>
        <select name="tipoCliente">
            <option>Particular</option>
            <option>Organismo Público</option>
        </select>
        <br></br>
        <label for="nombreC">Nombre Cliente</label>
        <input type="text" name="nombreC" placeholder="Nombre del Cliente">
        <br></br>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email@email.com">
        <br></br>
        <label for="tipoM">Tipo Motor</label></br>
        <input type="radio" name="tipoM" value="Diesel" checked="checked">Diesel
        <input type="radio" name="tipoM" value="Gasolina" checked="checked">Gasolina
        <input type="radio" name="tipoM" value="Diesel" checked="checked">Electrico
        <br></br>
        <label for="opc">Opciones</label></br>
        <input type="checkbox" name="climatizador" value="clim">Climatizador
        <input type="checkbox" name="gps" value="gps" value="gps">Gps
        <input type="checkbox" name="camara" value="Camara">Camára
        <br></br>
        <label>Modelo</label>
        <select name="modelo">
    			<option selected="selected">Ford Focus</option>
    			<option>Citrpen C4</option>
    			<option>Seat Ibiza</option>
    		</select>6
        <label for="precio">Precio</label>
        <input type="text" name="precio" placeholder="10000">
        <br></br>

        <label>Selecciona Promocion</label>
        <select name="promoc">
    			<option selected="selected">Sin Promocion</option>
    			<option value="PGE">Plan Green Energy (-2500)</option>
    			<option value="PR"> Plan Renove (-2000)</option>
    		</select> 
            <br></br>
            <input type="submit" name="Enviar" value="Enviar">
    </form>
</body>
</html>