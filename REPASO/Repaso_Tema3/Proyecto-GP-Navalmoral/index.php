<?php
require_once 'controlador.php';

if ($bd->getConexion() == null) {
    $error = 'No hay conexion en la base de datos';

} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <title>Piloto</title>
    </head>

    <body class="bg-light">

        <div class="container vh-100 d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">Pilotos</h2>

                    <section>
                        <h3 style="color:red">Mensaje</h3>
                        <?php
                        //!lo que hago es mostrar con echo si hay mensaje si 
                        //!se cumple la condicion nos muestra el mensaje si no lo deja vacio -->
                        echo (isset($mensaje) ? $mensaje : '')
                        ?>
                    </section>


                    <form action="" method="post">

                        <div class="mb-3">

                            <label for="piloto" class="form-label">Pilotos</label>
                            <select class="form-select" name="piloto" id="piloto">
                                <?php
                                //*aqui nos tenemos que recorrer todos los pilotos que hay en nuestra base de datos

                                foreach ($bd->obtenerPilotos() as $piloto) {
                                    echo '<option value="' . $piloto->getId()  . '">' . $piloto->getNombre()
                                        . '-' . $piloto->getEscuderia() . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="btnCarrera" id="btnCarrera" class="btn btn-primary">Ver Carrera</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

       

    </html>
<?php
}
?>