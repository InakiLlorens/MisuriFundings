<?php
include_once 'connect_data.php';
include_once 'crowdfundingClass.php';
include_once 'votoModel.php';
include_once 'usuarioModel.php';
include_once 'preguntaModel.php';
include_once 'comentarioModel.php';
include_once 'contribucionModel.php';
include_once 'actualizacionModel.php';

class crowdfundingModel extends crowdfundingClass {
    private $link;
    private $list=array();
    private $listVotos= array();
    private $listPreguntas= array();
    private $listComentarios=array();
    private $listContribuciones=array();
    private $listActualizaciones=array();
    private $objUsuario;
    //voto positivo = 1
    //voto negativo = 0
    //no votado = -1
    
    private $votado; //si el usuario lo ha votado o no
    private $votosPositivos;
    private $votosNegativos;
    
    private $miPropiedad;
   
    /**
     * @return multitype:
     */
    public function getListActualizaciones()
    {
        return $this->listActualizaciones;
    }

    /**
     * @param multitype: $listActualizaciones
     */
    public function setListActualizaciones($listActualizaciones)
    {
        $this->listActualizaciones = $listActualizaciones;
    }

    /**
     * @return multitype:
     */
    public function getListContribuciones()
    {
        return $this->listContribuciones;
    }

    /**
     * @param multitype: $listContribuciones
     */
    public function setListContribuciones($listContribuciones)
    {
        $this->listContribuciones = $listContribuciones;
    }

    /**
     * @return mixed
     */
    public function getObjUsuario()
    {
        return $this->objUsuario;
    }

    /**
     * @param mixed $objUsuario
     */
    public function setObjUsuario($objUsuario)
    {
        $this->objUsuario = $objUsuario;
    }

    /**
     * @return mixed
     */
    public function getVotosPositivos() {
        return $this->votosPositivos;
    }
    
    public function getList() {
        return $this->list;
    }
    
    /**
     * @return mixed
     */
    public function getVotosNegativos() {
        return $this->votosNegativos;
    }
    
    /**
     * @param mixed $votosPositivos
     */
    public function setVotosPositivos($votosPositivos) {
        $this->votosPositivos = $votosPositivos;
    }
    
    /**
     * @return multitype:
     */
    public function getListPreguntas()
    {
        return $this->listPreguntas;
    }

    /**
     * @return multitype:
     */
    public function getListComentarios()
    {
        return $this->listComentarios;
    }

    /**
     * @param multitype: $listPreguntas
     */
    public function setListPreguntas($listPreguntas)
    {
        $this->listPreguntas = $listPreguntas;
    }

    /**
     * @param multitype: $listComentarios
     */
    public function setListComentarios($listComentarios)
    {
        $this->listComentarios = $listComentarios;
    }

    /**
     * @param mixed $votosNegativos
     */
    public function setVotosNegativos($votosNegativos) {
        $this->votosNegativos = $votosNegativos;
    }
    
    /**
     * @return multitype:
     */
    public function getListVotos() {
        return $this->listVotos;
    }
    
    /**
     * @param multitype: $listVotos
     */
    public function setListVotos($listVotos) {
        $this->listVotos = $listVotos;
    }
    
    /**
     * @return mixed
     */
    public function getVotado() {
        return $this->votado;
    }
    
    /**
     * @param mixed $votado
     */
    public function setVotado($votado) {
        $this->votado = $votado;
    }
    
    public function OpenConnect() {
        $konDat = new connect_data();
        
        try {
            $this->link = new mysqli($konDat->host, $konDat->userbbdd, $konDat->passbbdd, $konDat->ddbbname);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        $this->link->set_charset("utf8");
    }
    
    public function CloseConnect() {
        //mysqli_close ($this->link);
        
        $this->link->close();
    }
    
    public function setList() {
        $this->OpenConnect();  //Abrir conexión
        
        $sql = "CALL spOrderByVoto()"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $funding=new crowdfundingModel();
            
            $funding->setId($row['id']);
            $funding->setNombre($row['nombre']);
            $funding->setDescripcion($row['descripcion']);
            $funding->setDineroR($row['dineroR']);
            $funding->setDineroO($row['dineroO']);
            $funding->setFechaFin($row['fechaFin']);
            $funding->setImagen($row['imagen']);
            $funding->setIdUsuario($row['idUsuario']);
            $newVotos= new votoModel();
            $newVotos->setIdFunding($funding->getId());
            
            $newUsuario = new usuarioModel();
            $newUsuario->setId($funding->getIdUsuario());
            $newUsuario->setUserById();
            $funding->setObjUsuario($newUsuario);
            
            $funding->setVotado($newVotos->setListByFundingId());
            $funding->setListVotos($newVotos->getList());

            
            
            
            array_push($this->list, $funding);
        }
        
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    /**
     * @return mixed
     */
    public function getMiPropiedad()
    {
        return $this->miPropiedad;
    }

    /**
     * @param mixed $miPropiedad
     */
    public function setMiPropiedad($miPropiedad)
    {
        $this->miPropiedad = $miPropiedad;
    }

    public function selectFundingById($idFunding) {
        $this->OpenConnect();  //Abrir conexión
        
        $sql = "CALL spFundingById($idFunding)"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $this->setId($row['id']);
            $this->setNombre($row['nombre']);
            $this->setDescripcion($row['descripcion']);
            $this->setDineroR($row['dineroR']);
            $this->setDineroO($row['dineroO']);
            $this->setFechaFin($row['fechaFin']);
            $this->setImagen($row['imagen']);
            $this->setIdUsuario($row['idUsuario']);
            $newVotos= new votoModel();
            $newVotos->setIdFunding($this->getId());
            $this->setVotado($newVotos->setListByFundingId());
            
            $newPreguntas = new preguntaModel();
            $newPreguntas->setIdFunding($this->getId());
            $newPreguntas->setListByFundingId();
            
            $newComentario = new comentarioModel();
            $newComentario->setIdFunding($this->getId());
            $newComentario->setListByIdFunding();
            
            $newUsuario = new usuarioModel();
            $newUsuario->setId($this->getIdUsuario());
            $newUsuario->setUserById();
            $this->setObjUsuario($newUsuario);
            
            $newContribucion = new contribucionModel();
            $newContribucion->setIdFunding($this->getId());
            $newContribucion->setListByIdFunding();
            
            $newActualizacion = new actualizacionModel();
            $newActualizacion->setIdFunding($this->getId());
            $newActualizacion->setListByFundingId();
            
            
            
            
            $this->setListActualizaciones($newActualizacion->getList());
            $this->setListContribuciones($newContribucion->getList());
            $this->setListVotos($newVotos->getList());
            $this->setListComentarios($newComentario->getList());
            $this->setListPreguntas($newPreguntas->getList());
        }
        
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function insertFunding() {
        $this->OpenConnect();
        
        $nombre=$this->getNombre();
        $descripcion=$this->getDescripcion();
        $dineroO=$this->getDineroO();
        $fechaFin=$this->getFechaFin();
        $imagen=$this->getImagen();
        $idUsuario=$this->getIdUsuario();
        
        
        $sql = "call  spInsertFunding('$nombre', '$descripcion', $dineroO, '$fechaFin', '$imagen', $idUsuario)";
        
        if ($this->link->query($sql)>=1) { // insert egiten da
            return "El funding se ha insertado con exito";
        }else {
            return "Fallï¿½ al insertar el funding: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function selectFundingByName($nombreFunding) {
        $this->OpenConnect();  //Abrir conexión
        
        $sql = "CALL spFundingByName('$nombreFunding')"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $funding=new crowdfundingModel();
            
            $funding->setId($row['id']);
            
            return $funding->getId();
        }
        
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function deleteFunding() {
        $this->OpenConnect();  //Abrir conexión
        
        $idFunding=$this->getIdFunding();
        
        $sql = "CALL spDeleteFunding ($idFunding)"; //Sentencia SQL
        
        echo $sql;
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
                
        $this->CloseConnect();
    }
    
    public function countVotes() {
        for ($i = 0; $i < sizeof($this->getList()); $i++) {
            $votosPositivos=0;
            $votosNegativos=0;
            $votosList=$this->getList()[$i]->getListVotos();
            
            for ($j = 0; $j < sizeof($votosList); $j++) {
                if ($votosList[$j]->getPositivo()==1) {
                    $votosPositivos++;
                }else {
                    $votosNegativos++;
                }
            }
            $this->getList()[$i]->setVotosPositivos($votosPositivos);
            $this->getList()[$i]->setVotosNegativos($votosNegativos);
        }
    }
    
    public function countThisVotes() {        
        $votosPositivos=0;
        $votosNegativos=0;
        $votosList=$this->getListVotos();
        
        for ($j = 0; $j < sizeof($votosList); $j++) {
            if ($votosList[$j]->getPositivo()==1) {
                $votosPositivos++;
            }else {
                $votosNegativos++;
            }
        }
        
        $this->setVotosPositivos($votosPositivos);
        $this->setVotosNegativos($votosNegativos);
    }
    public function checkMyProperty($id){
        
        if ($this->getObjUsuario()->getId()== $id){
            $this->setMiPropiedad(true);
        }
        else{
            $this->setMiPropiedad(false);
        }
    }
    
    function getListJsonString() {
        $arr=array();
        
        foreach ($this->list as $object) {
            $vars = get_object_vars($object);
            $arrVotos=array();
            foreach($object->getListVotos() as $objectVoto){
                $varsVoto = $objectVoto->getObjectVars();
                array_push($arrVotos, $varsVoto);
            }
            $vars["listVotos"]=$arrVotos;
            $vars["objUsuario"]=$object->getObjUsuario()->getObjectVars();
            array_push($arr, $vars);
        }
        return $arr;
    }
    
    function getThisJsonString() {
        
        $vars = get_object_vars($this);
        
        $arrVotos=array();
        foreach($this->getListVotos() as $objectVoto){
            $varsVoto = $objectVoto->getObjectVars();
            array_push($arrVotos, $varsVoto);
        }
        $arrPreguntas=array();
        foreach($this->getListPreguntas() as $objectPregunta){
            $varsPregunta = $objectPregunta->getObjectVars();
            array_push($arrPreguntas, $varsPregunta);
        }
        $arrComentario=array();
        foreach($this->getListComentarios() as $objectComentario){
            $varsComentario = $objectComentario->getObjectVars();
            $varsComentario["objUser"] = $objectComentario->getObjUser()->getObjectVars();
            array_push($arrComentario, $varsComentario);
        }
        
        $arrContribuciones=array();
        foreach($this->getListContribuciones() as $objectContribuciones){
            $varsContribuciones = $objectContribuciones->getObjectVars();
            array_push($arrContribuciones, $varsContribuciones);
        }
        
        $arrActualizaciones=array();
        foreach($this->getListActualizaciones() as $objectActualizaciones){
            $varsActualizaciones = $objectActualizaciones->getObjectVars();
            array_push($arrActualizaciones, $varsActualizaciones);
        }
        
        $vars["listActualizaciones"]=$arrActualizaciones;
        $vars["listContribuciones"]=$arrContribuciones;
        $vars["objUsuario"]=$this->getObjUsuario()->getObjectVars();
        $vars["listComentarios"]=$arrComentario;
        $vars["listPreguntas"]=$arrPreguntas;
        $vars["listVotos"]=$arrVotos;
        
        return $vars;
    }
}
?>