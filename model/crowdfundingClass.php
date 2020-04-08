<?php
class crowdfundingClass {    
    protected $id;
    protected $nombre; //Nombre o título del proyecto
    protected $descripcion; //Explicación del proyecto
    protected $dineroR; //Dinero Recaudado: el dinero obtenido hasta el momento
    protected $dineroO; //Dinero Objetivo: el dinero que se quiere conseguir
    protected $fechaFin; //Fecha límite para recaudar el dinero
    protected $imagen; //Imagen de ejemplo visual del proyecto
    
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getDineroR() {
        return $this->dineroR;
    }

    public function getDineroO() {
        return $this->dineroO;
    }

    public function getFechaFin() {
        return $this->fechaFin;
    }

    public function getImagen() {
        return $this->imagen;
    }
    

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setDineroR($DineroR) {
        $this->dineroR = $DineroR;
    }

    public function setDineroO($dineroO) {
        $this->dineroO = $dineroO;
    }

    public function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }
 


    function getObjectVars() {
        $vars=get_object_vars($this);
        return  $vars;
    } 
    
}
?>
