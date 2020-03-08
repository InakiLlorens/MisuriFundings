<?php
class preguntaClass {    
    protected $id;
    protected $pregunta; //La preunta en si (en el esquema tenemos nombre)
    protected $respuesta; //La pregunta respondida (en el esquema tenemos descripcion)
    protected $idFunding;
    
    function getId() {
        return $this->id;
    }

    function getPregunta() {
        return $this->pregunta;
    }
    
    function getRespuesta() {
        return $this->respuesta;
    }

    function getIdFunding() {
        return $this->idFunding;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }
    
    function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
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
