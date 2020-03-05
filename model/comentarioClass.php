<?php
class comentarioClass {    
    protected $id;
    protected $comentario; //El comentario realizado
    protected $idUsuario;
    protected $idFunding;
    
    function getId() {
        return $this->id;
    }

    function getComentario() {
        return $this->comentario;
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

    function setComentario($comentario) {
        $this->comentario = $comentario;
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
