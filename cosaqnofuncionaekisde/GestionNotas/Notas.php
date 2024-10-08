<?php

class Notas{
//asignamos los atributos

    private $asig,$fecha,$tipo,$descrip,$nota;

    function __constructor($asig,$fecha,$tipo,$descrip,$nota){
        //Constructor parametrizado
    
        $this->asig=$asig;
        $this->fecha=$fecha;
        $this->tipo=$tipo;
        $this->descrip=$descrip;
        $this->nota=$nota;
    
    }


    /**
     * Get the value of asig
     */ 
    public function getAsig()
    {
        return $this->asig;
    }

    /**
     * Set the value of asig
     *
     * @return  self
     */ 
    public function setAsig($asig)
    {
        $this->asig = $asig;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of descrip
     */ 
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Set the value of descrip
     *
     * @return  self
     */ 
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get the value of nota
     */ 
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set the value of nota
     *
     * @return  self
     */ 
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }
}

?>