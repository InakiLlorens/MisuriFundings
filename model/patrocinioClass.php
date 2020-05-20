<?php
class patrocinioClass {    
    protected $id;
    protected $idUsuario;
    protected $idFunding;
    protected $idContribucion;
    protected $CVV;
    protected $numero;
    protected $fechaCad;
    protected $titular;
    
    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdFunding() {
        return $this->idFunding;
    }

    /**
     * @return mixed
     */
    public function getIdContribucion() {
        return $this->idContribucion;
    }

    /**
     * @return mixed
     */
    public function getCVV() {
        return $this->CVV;
    }

    /**
     * @return mixed
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getFechaCad() {
        return $this->fechaCad;
    }

    /**
     * @return mixed
     */
    public function getTitular() {
        return $this->titular;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @param mixed $idFunding
     */
    public function setIdFunding($idFunding) {
        $this->idFunding = $idFunding;
    }

    /**
     * @param mixed $idContribucion
     */
    public function setIdContribucion($idContribucion) {
        $this->idContribucion = $idContribucion;
    }

    /**
     * @param mixed $CVV
     */
    public function setCVV($CVV) {
        $this->CVV = $CVV;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    /**
     * @param mixed $fechaCad
     */
    public function setFechaCad($fechaCad) {
        $this->fechaCad = $fechaCad;
    }

    /**
     * @param mixed $titular
     */
    public function setTitular($titular) {
        $this->titular = $titular;
    }

    function getObjectVars() {
        $vars=get_object_vars($this);
        return  $vars;
    } 
}
?>