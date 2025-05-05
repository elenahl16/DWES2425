<?php
require_once "controlador.php";
require_once "Modelo.php";

//* comprobamos al principio del index si tenemos conexion a la base de datos, primero hacemo sun objeto de la clase bd
$bd = new Modelo();
if ($bd->getConexion() == null) {
	$mensaje = 'Error, no se puede conectar a la base de datos';
} else {

?>

	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="UTF-8">
		<title>NavalBus</title>
	</head>

	<body>
		<h1>NavalBus</h1>
		<!-- Sección de Mensajes -->
		<section>
			<h3 style="color:red">Mensaje</h3>
			<?php
			//!lo que hago es mostrar con echo si hay mensaje si 
			//!se cumple la condicion nos muestra el mensaje si no lo deja vacio -->
			echo (isset($mensaje) ? $mensaje : '')
			?>
		</section>

		<!-- Sección de Inicio de Servicio -->
		<h2>Iniciar Servicio</h2>
		<form action="" method="POST">
			<label for="linea">Línea</label>
			<select name="linea">
				<?php
				//*aqui recorremos todos las lineas que hay en la base de datosd esta manera es mas directa 
				foreach ($bd->obtenerLineas() as $l) {
					echo '<option value="' . $l->getId()  . '">' . $l->getNombre() . '</option>';
				}
				?>
			</select>
			<label for="conductor">Conductor</label>
			<input type="text" name="conductor" placeholder="Id Conductor" />
			<button type="submit" name="iniciar">Iniciar Servicio</button>
		</form>
		<!-- Sección de Servicio
		aqui vamos a mostrar los datos del conductor
		 y de la linea que hemos seleccionado que se va almacenar en la session -->
		<h2>Conductor:
			<?php
				//Recuperamos la sesión de conductor y de linea
				$c=$_SESSION['conductor'];
				$l=$_SESSION['linea'];

				echo $c->getNombreApe() . ' - ' . $l->getNombre() . '(' . $l->getOrigen() . '-' . $l->getDestino() . ')';
			?>
		</h2>
		</h2>
		<form method="post">
			<h4 style="color:blue">Tipo de Billete</h4>
			<select name="tipo">
				<option selected="selected">General</option>
				<option>Reducido</option>
			</select>
			<button type="submit" name="vender">Vender</button>
			<button type="submit" name="fin">Finalizar Servicio</button>
			<h3 style="color:blue">Recaudado:
			<?php 
			//llamamos al metodo obtenerRecaudo y lo mostramos
				echo $bd->obtenerRecaudado($_SESSION['conductor'],$_SESSION['linea']);
			?>
			</h3>
			<table width="100%">
				<tr>
					<td>
						<h3 style="color:blue">Fecha</h3>
					</td>
					<td>
						<h3 style="color:blue">Línea</h3>
					</td>
					<td>
						<h3 style="color:blue">Tipo Billete</h3>
					</td>
					<td>
						<h3 style="color:blue">Precio</h3>
					</td>
				</tr>

			</table>
		</form>
	</body>

	</html>
<?php
	//* y cerramos abajo del todo el else para que solo nos muestre el

}
?>