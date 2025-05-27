<?php
class Vuelta{
    private $id;
    private $idPiloto;
    private $tiempo;
    private $anulado;

    function __construct($id,$idPiloto,$tiempo,$anulado) {
        $this->id=$id;
        $this->idPiloto=$idPiloto;
        $this->tiempo=$tiempo;
        $this->anulado=$anulado;
    }


    /**
     * Get the value of idPiloto
     */ 
    public function getIdPiloto()
    {
        return $this->idPiloto;
    }

    /**
     * Set the value of idPiloto
     *
     * @return  self
     */ 
    public function setIdPiloto($idPiloto)
    {
        $this->idPiloto = $idPiloto;

        return $this;
    }

    /**
     * Get the value of tiempo
     */ 
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Set the value of tiempo
     *
     * @return  self
     */ 
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Get the value of anulado
     */ 
    public function getAnulado()
    {
        return $this->anulado;
    }

    /**
     * Set the value of anulado
     *
     * @return  self
     */ 
    public function setAnulado($anulado)
    {
        $this->anulado = $anulado;

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