<?php
class preguntaClass {    
    protected $id;
    protected $descripcion; //La pregunta realizada
    protected $idUsuario; //Tenemos puesto nombre en el esquema
    protected $idFunding;
    
    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdFunding() {
        return $this->idFunding;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
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
