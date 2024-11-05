<?php
class Compra{

    private $id,$producto,$tipo,$fechaLimite,$dinero;


    function __construct($id,$producto,$tipo,$fechaLimite,$dinero){

        $this->id=$id; 
        $this->producto=$producto;
        $this->tipo=$tipo; 
        $this->fechaLimite=$fechaLimite;
        $this->dinero=$dinero;
    
    }
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of producto
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     *
     * @return  self
     */ 
    public function setProducto($producto)
    {
        $this->producto = $producto;

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
     * Get the value of fechaLimite
     */ 
    public function getFechaLimite()
    {
        return $this->fechaLimite;
    }

    /**
     * Set the value of fechaLimite
     *
     * @return  self
     */ 
    public function setFechaLimite($fechaLimite)
    {
        $this->fechaLimite = $fechaLimite;

        return $this;
    }

    /**
     * Get the value of dinero
     */ 
    public function getDinero()
    {
        return $this->dinero;
    }

    /**
     * Set the value of dinero
     *
     * @return  self
     */ 

    public function setDinero($dinero)
    {
        $this->dinero = $dinero;

        return $this;
    }
}
?>