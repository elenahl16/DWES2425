<?php

    //Recuperamos el valor de la cookie si está
    if(isset($_COOKIE['miPrimeraC'])){
        $valorC= $_COOKIE['miPrimeraC'];
    }

     
    if(isset($_POST['guardar'])){
        //Creamos una cookie y le damos el valor del input

        if(!empty($_POST['valor'])){
            //ponemos como fecha de caducidad un mes a partir de hoy
            setcookie('miPrimeraC',$_POST['valor'],time()+(60*60*24*30));

            //recargamos la pagina para actualizar $_COOKIE
            header('location:01PrimeraCookie.php');
        }
    }

    //para poder borrar la cookie
    if(isset($_COOKIE['borrar'])){

        //borramos la cookie y para poder hacerlo ponemos como que ha caducado
        setcookie('miPrimeraC','',time()-1);

        //recargamos la pagina para actualizar $_COOKIE
        header('location:01PrimeraCookie.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Valor de la cookie</label>
        <input type="text" name="valor"
        value="<?php echo (isset($valorC)?$valorC:'')?>"
        placeholder="Valor que se almacena en la cookie miPrimeraC"/>
        <input type="submit" name="guardar" value="Guardar"/>
        <input type="submit" name="borrar" value="Borrar"/>
    </form>   
</body>
</html>