<?php
include_once 'connect_data.php';
include_once 'crowdfundingClass.php';
include_once 'votoModel.php';

class crowdfundingModel extends crowdfundingClass {
    private $link;
    private $list=array();
    private $listVotos= array();
    private $votado; //si el usuario lo ha votado o no
    
    /**
     * @return multitype:
     */
    public function getListVotos()
    {
        return $this->listVotos;
    }

    /**
     * @param multitype: $listVotos
     */
    public function setListVotos($listVotos)
    {
        $this->listVotos = $listVotos;
    }

    /**
     * @return mixed
     */
    public function getVotado()
    {
        return $this->votado;
    }

    /**
     * @param mixed $votado
     */
    public function setVotado($votado)
    {
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
        
        $sql = "CALL spAllCrowdfundings()"; //Sentencia SQL
        
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
            
            $newVotos= new votoModel();
            $newVotos->setIdFunding($funding->getId());
            
            $funding->setVotado($newVotos->setListByFundingId());
            
            $newVotos->setListByFundingId();
            
           
            $funding->setListVotos($newVotos->getList());
       
            
            array_push($this->list, $funding);
        }
        
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    function getListJsonString() {
        $arr=array();
      
      
        foreach ($this->list as $object)
        {
            
            $vars = get_object_vars($object);
            $arrVotos=array();
            foreach($object->getListVotos() as $objectVoto){
                $varsVoto = $objectVoto->getObjectVars();
                array_push($arrVotos, $varsVoto);
            }
            $vars["listVotos"]=$arrVotos;

            array_push($arr, $vars);
        }
        return $arr;
    }
}
?>
