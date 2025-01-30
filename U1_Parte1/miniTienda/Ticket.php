<?php

//esto es una clase
class Ticket{
    private $producto;
    private $precio;
    private $cantidad;
    private $total;

    //ahora hacemos el constructor para hacerlo hay que poner espacio y dos __ obligatorio
    function __construct($producto,$precio,$cantidad){
        $this-> producto =$producto;
        $this-> precio =$precio;
        $this-> cantidad =$cantidad;
        $this-> total =$precio * $cantidad;

    }
    //Desconstructor guiones __ obligatorios
    function __destruct(){
        echo "<h4 style=' color:red'> Producto ".$this->producto." destruido</h4>";

    }

    /**
     * Get the value of producto
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
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
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}
?>