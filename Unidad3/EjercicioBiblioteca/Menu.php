<?php
    //si la url a la que estamos llamando
    if(basename($_SERVER['PHP_SELF'])=='Menu.php'){
        header('location:prestamos.php');

    }
?>
<a href="prestamos.php">Préstamos</a>
<a href="libros.php">Libros</a>
<?php
    if($_SESSION['usuario']->getTipo() =='A'){
        

    }
?>
<a href="Socio.php">Socios</a>

<form action="" method="post">
    <span><?php echo $_SESSION['usuario']->getId();?></span>
    <button type="submit" name="cerrar">Salir</button>
</form>