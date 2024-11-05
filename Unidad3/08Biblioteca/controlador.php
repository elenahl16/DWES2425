<?php
require_once 'Modelo.php';

function generarInput($tipo, $nombre, $valor, $boton, $valorBoton)
{
    if (isset($_POST[$boton]) && $_POST[$boton] == $valorBoton) {
        return '<' . $tipo . ' name="' . $nombre . '" value="' . $valor . '"/>';
    } else {
        return $valor;
    }
}
function generarBotones($nombreB1, $nombreB2, $textoB1, $textoB2, $boton, $valorBoton)
{
    if (isset($_POST[$boton]) && $_POST[$boton] == $valorBoton) {
        return '<button class="btn btn-outline-secondary" type="submit" name="' .
            $nombreB2 . '" value="' . $valorBoton . '">' . $textoB2 . '</button>';
    } else {
        return '<button class="btn btn-outline-secondary" type="submit" name="' .
            $nombreB1 . '" value="' . $valorBoton . '">' . $textoB1 . '</button>';
    }
}

function generarModal($titulo){

    return '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$titulo.'</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>';
    
}




session_start();
//Si no hay sessión iniciada, redirigimos a login
if (!isset($_SESSION['usuario'])) {
    header('location:login.php');
}

if (isset($_POST['cerrar'])) {
    session_destroy();
    header('location:login.php');
}
//Creamos objeto de acceso a la BD
$bd = new Modelo();
if (isset($_POST['pCrear']) and $_SESSION['usuario']->getTipo() == 'A') {
    //TEnemos que crear un préstamo
    //Usamos la función de la bd comprobarSiPrestar(pSocio int, pLibro int)
    //para ver si se puede hacer el préstamo
    $resultado = $bd->comprobar($_POST['socio'], $_POST['libro']);
    if ($resultado == 'ok') {
        //Hacer el préstamo
        $numero = $bd->crearPrestamo($_POST['socio'], $_POST['libro']);
        if ($numero > 0) {
            $mensaje = 'Préstamo nº ' . $numero . ' registrado';
        } else {
            $error = 'Se ha producido un error al crear el préstamo';
        }
    } else {
        $error = $resultado;
    }
}
if (isset($_POST['pDevolver']) and $_SESSION['usuario']->getTipo() == 'A') {
    //Obtener el préstamos
    $p = $bd->obtenerPrestamo($_POST['pDevolver']);
    if ($p != null) {
        //Chequear si hay que sancionar al socio
        $sancion = false;
        if (strtotime($p->getFechaD()) < strtotime(date('Y-m-d'))) {
            $sancion = true;
        }
        if ($bd->devolverPrestamo($p, $sancion)) {
            $mensaje = 'Préstamo devuelto';
            if ($sancion) {
                $mensaje .= ' Se ha sancionado al socio';
            }
        } else {
            $error = 'Error, al devolver el préstamo';
        }
    } else {
        $error = 'Préstamo no existe';
    }
}
if (isset($_POST['lCrear']) and $_SESSION['usuario']->getTipo() == 'A') {
    if (empty($_POST['titulo']) or empty($_POST['autor']) or empty($_POST['ejemplares'])) {
        $error = 'Error, rellena los datos del libros';
    } else {
        $l = new Libro(0, $_POST['titulo'], $_POST['ejemplares'], $_POST['autor']);
        $numero = $bd->crearLibro($l);
        if ($numero > 0) {
            $mensaje = 'Libros nº ' . $numero . ' creado';
        } else {
            $error = 'Se ha producido un error al crear el libro';
        }
    }
}
if (isset($_POST['sCrearSocio']) and $_SESSION['usuario']->getTipo() == 'A') {
    if (!empty($_POST['dni']) and !empty($_POST['tipo'])) {
        //Comprobar si ya hay un usuario con ese dni
        $us = $bd->obtenerUsuarioDni($_POST['dni']);
        if ($us == null) {
            $u = new Usuario($_POST['dni'], $_POST['tipo']);
            if ($_POST['tipo'] == 'A') {
                //Crear Admin
                if ($bd->crearUsuario($u, null)) {
                    $mensaje = 'Usuario administrador creado';
                    //Una vez que se crea el socio, se destruye la variables de sesión
                    //Y se dejan de recordar datos
                    unset($_POST['dni']);
                    unset($_POST['tipo']);
                } else {
                    $error = 'Error al crea el usuario';
                }
            } elseif ($_POST['tipo'] == 'S' and !empty($_POST['nombre']) and !empty($_POST['email'])) {
                //Crear socio si todos los dratos están rellenos
                $s = new Socio(0, $_POST['nombre'], '', $_POST['email'], $_POST['dni']);
                if ($bd->crearUsuario($u, $s)) {
                    $mensaje = 'Usuario socio creado';
                    //Una vez que se crea el socio se dejan de recordar datos
                    unset($_POST['dni']);
                    unset($_POST['tipo']);
                    unset($_POST['nombre']);
                    unset($_POST['email']);
                } else {
                    $error = 'Error al crea el usario';
                }
            }
        } else {
            $error = 'Error, ya existe un usuario con ese DNI';
        }
    } else {
        $error = 'Rellene los datos del usuario';
    }
}
if (isset($_POST['sCrearSocio']) and $_SESSION['usuario']->getTipo() == 'A') {
    if (!empty($_POST['dni']) and !empty($_POST['tipo'])) {
        //Comprobar si ya hay un usuario con ese dni
        $us = $bd->obtenerUsuarioDni($_POST['dni']);
        if ($us == null) {
            $u = new Usuario($_POST['dni'], $_POST['tipo']);
            if ($_POST['tipo'] == 'A') {
                //Crear Admin
                if ($bd->crearUsuario($u, null)) {
                    $mensaje = 'Usuario administrador creado';
                    //Una vez que se crea el socio, se destruye la variables de sesión
                    //Y se dejan de recordar datos
                    unset($_POST['dni']);
                    unset($_POST['tipo']);
                } else {
                    $error = 'Error al crea el usuario';
                }
            } elseif ($_POST['tipo'] == 'S' and !empty($_POST['nombre']) and !empty($_POST['email'])) {
                //Crear socio si todos los dratos están rellenos
                $s = new Socio(0, $_POST['nombre'], '', $_POST['email'], $_POST['dni']);
                if ($bd->crearUsuario($u, $s)) {
                    $mensaje = 'Usuario socio creado';
                    //Una vez que se crea el socio se dejan de recordar datos
                    unset($_POST['dni']);
                    unset($_POST['tipo']);
                    unset($_POST['nombre']);
                    unset($_POST['email']);
                } else {
                    $error = 'Error al crea el usario';
                }
            }
        } else {
            $error = 'Error, ya existe un usuario con ese DNI';
        }
    } else {
        $error = 'Rellene los datos del usuario';
    }
}
if (isset($_POST['sGSocio']) and $_SESSION['usuario']->getTipo() == 'A') {
    //Obtener los datos antiguos del usuario
    $u = $bd->obtenerUsuarioDni($_POST['sGSocio']);
    if (empty($_POST['dni'])) {
        $error = 'Error, el id no puede estar vacío';
    }
    //comprobar si ha cambiado el dni
    elseif ($_POST['dni'] != $u->getId()) {
        //Se ha modificado el dni
        //Hay que compobar que no hay otro usuario con 
        //el nuevo dni
        $uNuevo = $bd->obtenerUsuarioDni($_POST['dni']);
        if ($uNuevo != null) {
            $error = 'Error, ya hay otro usuario con ese dni';
        }
    }
    if (!isset($error)) {
        //Modificamos datos
        $u->setId($_POST['dni']);

        //Recuperamos el socio
        $s = $bd->obtenerSocioDni($_POST['sGSocio']);

        if ($s != null) {

            $s->setNombre($_POST['nombre']);
            $s->setFechaSancion(isset($_POST['fSancion']) ? $_POST['fSancion']:null);
            $s->setEmail($_POST['email']);
        }

        if ($bd->modificarUSySocio($u, $s, $_POST['sGSocio'])) {
            $mensaje = 'Usuario modificado';

        } else {
            $error = 'Error al modificar el usuario';
        }
    }
}

if(isset($_POST['sBSocio']) and $_SESSION['usuario']->getTipo() =='A'){
    $u=$bd->obtenerUsuarioDni($_POST['usuario']);

    if($u!=null){

        if($u->getId()==$_SESSION['usuario']->getId()){
            $error='Error, no puedes borrar el usuario conectado';

        }
        else{
            //comprobamos si el usuario tiene prestamos
            $prestamos=$bd->obtenerPrestamosSocio($us);

            if(sizeof($prestamos)>0){
                //aviso

            }
            else{
                //borrar

                if($bd->borrarUsuario($u,false)){
                    $mensaje='Usuario borrado';
                }
            }
        }

    }

}