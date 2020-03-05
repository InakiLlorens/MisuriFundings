<?php
class votoClass {    
    protected $id;
    protected $positivo; //Un valor tipo boolean para ver si es un voto positivo o no
    protected $idUsuario;
    protected $idFunding;
    
    function getId() {
        return $this->id;
    }

    function getPositivo() {
        return $this->positivo;
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

    function setPositivo($positivo) {
        $this->positivo = $positivo;
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
