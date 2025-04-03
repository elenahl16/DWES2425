<?php
class Entrada{
    private $nombreCliente;
    private $tipoEntrada;
    private $fechaEvento;
    private $numEntradas;
    private $descuento;
    private $importe;


    function __construct($nombreCliente,$tipoEntrada,$fechaEvento,$numEntradas,$descuento,$importe){
        $this->nombreCliente=$nombreCliente;
        $this->tipoEntrada=$tipoEntrada;
        $this->fechaEvento=$fechaEvento;
        $this->numEntradas=$numEntradas;
        $this->descuento=$descuento;
        $this->importe=$importe;
    }

    /**
     * Get the value of nombreCliente
     */ 
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    /**
     * Set the value of nombreCliente
     *
     * @return  self
     */ 
    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;

        return $this;
    }

    /**
     * Get the value of fechaEvento
     */ 
    public function getFechaEvento()
    {
        return $this->fechaEvento;
    }

    /**
     * Set the value of fechaEvento
     *
     * @return  self
     */ 
    public function setFechaEvento($fechaEvento)
    {
        $this->fechaEvento = $fechaEvento;

        return $this;
    }

    /**
     * Get the value of numEntradas
     */ 
    public function getNumEntradas()
    {
        return $this->numEntradas;
    }

    /**
     * Set the value of numEntradas
     *
     * @return  self
     */ 
    public function setNumEntradas($numEntradas)
    {
        $this->numEntradas = $numEntradas;

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

    /**
     * Get the value of tipoEntrada
     */ 
    public function getTipoEntrada()
    {
        return $this->tipoEntrada;
    }

    /**
     * Set the value of tipoEntrada
     *
     * @return  self
     */ 
    public function setTipoEntrada($tipoEntrada)
    {
        $this->tipoEntrada = $tipoEntrada;

        return $this;
    }
}
?>