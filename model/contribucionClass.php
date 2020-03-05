<?php
class contribucionClass {    
    protected $id;
    protected $nombre; //Nombre o título de la contribución o tarifa
    protected $precio; //Coste de la contribución
    protected $descripcion; //Una breve descripción de la tarifa
    protected $recompensas; //Los elementos que ofrece la contribución
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getRecompensas() {
        return $this->recompensas;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    function setRecompensas($recompensas) {
        $this->recompensas = $recompensas;
    }

    function getObjectVars() {
        $vars=get_object_vars($this);
        return  $vars;
    } 
}
?>
