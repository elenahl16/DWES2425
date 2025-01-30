<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<body>
    <form action="#" method="post">
        <div>
            <label form="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre"></input>
        </div>
        <div>
            <label form="curso">Curso</label>
            <select name="curso" id="curso">
                <option value="Primero DAM">1º DAW</option>
                <option selected="Primero DAW">1º DAW</option>
                <option>1ºDAW</option>
                <option>2ºDAW</option>
            </select>
        </div>
        <div>
            <label form="asig">Asignaturas</label>
            <select name="asig[]" id="asig" multiple="multiple">
                <option >DWES</option>
                <option>DIC</option>
                <option>PROG</option>
                <option>BD</option>
            
            </select>
        </div>
        <div>
            <label>Sexo</label>
            <label for="hombre">Hombre</label>
            <input type="radio" id="hombre" name="sexo" value="hombre" checked="checked"></input>
            <label for="mujer">Mujer</label>
            <input type="radio" id="mujer" name="sexo" value="mujer"></input>
        </div>
        <div>
            <label>Otros</label></br>
            <label for="becaM">Beca MEC</label>
            <input type="checkbox" id="becaM" name="otros[]" value="becaM"></input>

            <label for="transporte">Transporte</label>
            <input type="checkbox" id="transporte" name="otros[]" value="transporte"></input>

            <label for="delegado">Delegado</label>
            <input type="checkbox" id="delegado" name="otros[]" value="delegado"></input>
        </div>
        <input type="submit" name="enviar" value="Enviar"></input>
        <input type="reset" value="Cancelar"></input>
    </form>
    <?php
    if(isset($_POST['enviar'])){
        echo "Nombre:".$_POST['nombre'];
        echo "<br/>Curso:".$_POST['curso'];
        echo "<br/>Asignaturas:";
        //Hay que chequear si se ha marcado alguna asignatura
        if(isset($_POST['asig'])){
            foreach($_POST['asig'] as $a){
                echo $a.' ';
            }
        }
        //Chequear si hay sexo seleccionado
        if(isset($_POST['sexo']))
             echo "<br/>Sexo:".$_POST['sexo'];
        echo "<br/>Otros:";
        //Chequear si se ha marcado alguno
        if(isset($_POST['otros'])){
            foreach($_POST['otros'] as $o){
                echo $o.' ';
            }
        }
    }
    ?>
</body>
</html>