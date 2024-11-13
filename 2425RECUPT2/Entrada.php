<?php

class Entrada{

    private $nombreC,$fecha,$entrada,$descuento,$importe;


    function __construct($nombreC,$fecha,$entrada,$descuento,$importe){

        $this->nombreC=$nombreC;
        $this->fecha=$fecha;
        $this->entrada=$entrada;
        $this->descuento=$descuento;
        $this->importe=$importe;
        
    }

    /**
     * Get the value of nombreC
     */ 
    public function getNombreC()
    {
        return $this->nombreC;
    }

    /**
     * Set the value of nombreC
     *
     * @return  self
     */ 
    public function setNombreC($nombreC)
    {
        $this->nombreC = $nombreC;

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
     * Get the value of entrada
     */ 
    public function getEntrada()
    {
        return $this->entrada;
    }

    /**
     * Set the value of entrada
     *
     * @return  self
     */ 
    public function setEntrada($entrada)
    {
        $this->entrada = $entrada;

        return $this;
    }

    /**
     * Get the value of descuento
     */ 
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set the value of descuento
     *
     * @return  self
     */ 
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get the value of importe
     */ 
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     *
     * @return  self
     */ 
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }
}
?>