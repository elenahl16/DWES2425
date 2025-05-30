<?php
class Piloto{
    private $id;
    private $nombre;
    private $escuderia;

    function __construct($id,$nombre,$escuderia) {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->escuderia=$escuderia;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of escuderia
     */ 
    public function getEscuderia()
    {
        return $this->escuderia;
    }

    /**
     * Set the value of escuderia
     *
     * @return  self
     */ 
    public function setEscuderia($escuderia)
    {
        $this->escuderia = $escuderia;

        return $this;
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
}

?>