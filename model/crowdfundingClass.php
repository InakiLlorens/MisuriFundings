<?php
class crowdfundingClass {    
    protected $id;
    protected $nombre; //Nombre o título del proyecto
    protected $descripcion; //Explicación del proyecto
    protected $dineroR; //Dinero Recaudado: el dinero obtenido hasta el momento
    protected $dineroO; //Dinero Objetivo: el dinero que se quiere conseguir
    protected $fechaFin; //Fecha límite para recaudar el dinero
    protected $imagen; //Imagen de ejemplo visual del proyecto
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getDineroR() {
        return $this->dineroR;
    }

    function getDineroO() {
        return $this->dineroO;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setDineroR($DineroR) {
        $this->dineroR = $dineroR;
    }

    function setDineroO($dineroO) {
        $this->dineroO = $dineroO;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function getObjectVars() {
        $vars=get_object_vars($this);
        return  $vars;
    } 
}
?>
