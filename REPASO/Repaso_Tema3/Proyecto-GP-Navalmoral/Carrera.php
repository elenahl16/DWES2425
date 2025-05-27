<?php
require_once 'controlador.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Carrera</title>
</head>

<body class="bg-light py-5">
    <div class="container">
        <div class="mb-4">
            <h3>Nombre:
                <?php
                //recuperamos el nombre de la sesion de piloto
                echo $_SESSION['piloto']->getNombre();
                ?>
            </h3>

            <h3>Escuderia:
                <?php
                //recuperamos el nombre de la sesion de piloto
                echo $_SESSION['piloto']->getEscuderia();
                ?>
            </h3>
        </div>

        <form action="" method="post" class="mb-5">
            <div class="mb-3">
                <label for="tiempo" class="form-label">Tiempo</label>
                <input type="number" id="tiempo" name="tiempo" class="form-control">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-info" name="btnCrear" id="btnCrear">Crear</button>
                <button type="submit" class="btn btn-danger" name="btnCerrar" id="btnCerrar">Cerrar Sesión</button>
            </div>
        </form>

        <h2 class="mb-3">Vuelta</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Duración</th>
                        <th>Anulado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //aqui vamos a recuperar las vueltas que hemos obtenidos de ese piloto enconcreto,
                    //entonces lo que hacemos es recuperar del metodo obtenerVueltas el id del piloto

                    foreach ($bd->obtenerVueltas($_SESSION['piloto']->getId()) as $v) {
                        //cierro el php para poder escribir en html la tabla y dentro de las etiquetas td lo abro 
                    ?>
                        <tr>
                            <td>
                                <?php echo $v->getId(); ?>
                            </td>
                            <td>
                                <?php echo $v->getTiempo(); ?>
                            </td>
                            <td>
                                <?php echo $v->getAnulado(); ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>