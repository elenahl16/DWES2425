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
                <label for="nombre">Nombre Completo</label><br />
                <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo" />
            </div>
            </br>

            <div>
                <label>Tipo Entrada</label><br />
                <input type="radio" id="general" name="tipos" value="general" checked="checkded"/>
                <label for="general">General</label>

                <input type="radio" id="mayor" name="tipos" value="mayor" />
                <label for="mayor">Mayor de 60</label>

                <input type="radio" id="menor" name="tipos" value="menor" />
                <label for="menor">Menor de 6</label>
            </div>
            </br>

            <div>
                <label for="fecha">Fecha del Evento</label><br/>
                <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d')?>" />
            </div>
            </br>

            <div>
                <label for="entradas">Número de Entradas:</label><br/>
                <input type="number" id="entradas" name="entradas" value="1"/>
            </div>
            </br>
            <div>
                <label for="descuentos">Descuento</label><br/>
                <select name="descuentos" id="descuentos">
                    <option>Familia Numerosa</option>
                    <option>Abonado</option>
                    <option>Día del Espectador</option>
                </select>
            </div>
            </br>
            <div>
                <input type="submit" name="comprar" value="comprar"/>
            </div>
        </fieldset>
    </form>
</body>
</html>