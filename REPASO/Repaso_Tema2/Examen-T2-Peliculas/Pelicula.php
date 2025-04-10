<?php 
class Pelicula{

    private $tituloPelicula;
    private $fechaReg;
    private $genero;
    private $tipo;
    private $capitulos;


    function __construct($tituloPelicula,$fechaReg,$genero,$tipo,$capitulos){
    
        $this->tituloPelicula=$tituloPelicula;
        $this->fechaReg=$fechaReg;
        $this->genero=$genero;
        $this->tipo=$tipo;
        $this->capitulos=$capitulos;
    }

    /**
     * Get the value of tituloPelicula
     */ 
    public function getTituloPelicula()
    {
        return $this->tituloPelicula;
    }

    /**
     * Set the value of tituloPelicula
     *
     * @return  self
     */ 
    public function setTituloPelicula($tituloPelicula)
    {
        $this->tituloPelicula = $tituloPelicula;

        return $this;
    }

    /**
     * Get the value of fechaReg
     */ 
    public function getFechaReg()
    {
        return $this->fechaReg;
    }

    /**
     * Set the value of fechaReg
     *
     * @return  self
     */ 
    public function setFechaReg($fechaReg)
    {
        $this->fechaReg = $fechaReg;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

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
     * Set the value of capitulos
     *
     * @return  self
     */ 
    public function setCapitulos($capitulos)
    {
        $this->capitulos = $capitulos;

        return $this;
    }
}
?>