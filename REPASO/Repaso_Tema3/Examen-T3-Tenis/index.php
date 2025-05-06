<?php
require_once 'controlador.php';
require_once 'Modelo.php';

//primero lo que hacemos es comprobar si hay conexion
$bd=new Modelo();
if($bd->getConexion()==null){
	$error='No hay conexion en la base de datos';

}
else{
?>
<!doctype html>
<html>
      <head>
        <meta charset="utf-8">        
        <title>Recupearción T3 2</title>
       </head>
     <body>
		<h1>Selecciona Partido</h1>
		<form action="" method="post">
    		<select name="partido">
				<?php
				foreach($bd->obtenerPartidos() as $j){
				 echo '<option value="' . $j->getCodigo()  . '">' . $j->getJugador1() ."-". $j->getJugador2() . '</option>';
				}
				?>
    		</select>
    		<input type="submit" value="Resultados" name="resultados">
		</form>
		
	</body>
</html>
<?php
}
?>

