<?php
require_once 'Trabajo.php';
class Modelo{
    private $nombreF='trabajos.txt';

    function __construct(){
        
    }

    function guardarTrabajo($t){//esta funcio va a guardar los datos de un trabajo que le asignemos a un fichero
        $resultado =false;

        //Primero tenemos q abrir el fichero, que en nuestro caso es el nombreF que sea de apertura y escritura
        $f = fopen($this->nombreF,'a+');
        
        if($f){
        //Escribimos dentro del fichero con fwrite una vez este abierto y
        // Cada propiedad del objeto `$t` se convierte a una cadena y se concatena en un formato específico.
        // La estructura de la línea es: fecha;cliente;tipo;servicios;importe
            fwrite($f,date('d/m/Y',strtotime($t->getFecha()))
            .';'.$t->getCliente()
            .';'.$t->getTipo()
            .';'.$t->getServicios()
            .';'.$t->getImporte().PHP_EOL);
            $resultado=true;
        }
        return $resultado;
    }

    function obtenerTrabajos(){ //esta funcion va a recuperar la informacion de todos los trabajos guardados en el fichero
       
        $resultado=array();// Inicializa un array vacío para almacenar los objetos `Trabajo`

        if(file_exists($this->nombreF)){//Verifica si el archivo especificado en `$this->nombreF` existe

            $trabajos = file($this->nombreF,FILE_IGNORE_NEW_LINES); 
            // Lee el archivo completo en un array, donde cada línea es un elemento del array `$trabajos`.
            // `FILE_IGNORE_NEW_LINES` evita que se incluya el carácter de salto de línea en cada elemento.

            foreach($trabajos as $t){// Recorre cada línea del archivo, almacenada en `$trabajos`.
              
                $fila = explode(';',$t);//lo que hace el explode separar la linea ';' donde lo almacena en la variable fila

                 // Crea un nuevo objeto `Trabajo` con los valores extraídos y lo agrega al array `$resultado`.
                $resultado[]=new Trabajo($fila[0],$fila[1],$fila[2],$fila[3],$fila[4]);
            }
        }
        return $resultado;
    }
}
?>