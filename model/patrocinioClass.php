<?php
class patrocinioClass {    
    protected $id;
    protected $idUsuario;
    protected $idFunding;
    protected $idContribucion;
    
    function getId() {
        return $this->id;
    }

    function getidUsuario() {
        return $this->idUsuario;
    }

    function getIdFunding() {
        return $this->idFunding;
    }

    function getIdContribucion() {
        return $this->idContribucion;
    } 

    function setId($id) {
        $this->id = $id;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdFunding($idFunding) {
        $this->idFunding = $idFunding;
    }

    function setIdContribucion($idContribucion) {
        $this->idContribucion = $idContribucion;
    }    

    function getObjectVars() {
        $vars=get_object_vars($this);
        return  $vars;
    } 
}
?>
