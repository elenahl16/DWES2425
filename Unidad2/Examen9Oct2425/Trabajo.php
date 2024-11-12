<?php
class Trabajo{

    private $fecha, $cliente, $tipo, $servicio, $importe;

    function __construct($fecha, $cliente, $tipo, $servicio, $importe)
    {

        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->tipo = $tipo;
        $this->servicio = $servicio;
        $this->importe = $importe;
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
     * Get the value of cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     *
     * @return  self
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

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
     * Get the value of servicio
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Set the value of servicio
     *
     * @return  self
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;

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
