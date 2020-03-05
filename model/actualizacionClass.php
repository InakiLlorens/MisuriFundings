<?php
class actualizacionClass {    
    protected $id;
    protected $nombre; //Nombre o título de la actualización realizada
    protected $descripcion; //Una explicación de los cambios realizados en la actualización
    protected $fecha; //Cuando se ha realizado la actualización
    protected $idFunding;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdFunding() {
        return $this->idFunding;
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
    
    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    
function setIdFunding($idFunding) {
        $this->idFunding = $idFunding;
    }

    function getObjectVars() {
        $vars=get_object_vars($this);
        return  $vars;
    } 
}
?>
