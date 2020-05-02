<?php
session_start();
include_once 'connect_data.php';
include_once 'votoClass.php';

class votoModel extends votoClass {
    
    private $link;
    private $list=array();

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
        
        $sql = "CALL spAllVotos()"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $voto=new votoModel();
            
            $voto->setId($row['id']);
            $voto->setPositivo($row['positivo']);
            $voto->setIdUsuario($row['idUsuario']);
	    $voto->setIdFunding($row['idFunding']);
            
            array_push($this->list, $voto);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    public function setListByFundingId() {
        
        $id=$_SESSION["id"];
        $idFunding=$this->getIdFunding();
        $votado=-1;
        $this->OpenConnect();  //Abrir conexión
        
        
        $sql = "CALL spVotosByIdFunding($idFunding)"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
       
     
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $voto=new votoModel();
            
            $voto->setId($row['id']);
            $voto->setPositivo($row['positivo']);
            $voto->setIdUsuario($row['idUsuario']);
            $voto->setIdFunding($row['idFunding']);
            if ($voto->getIdUsuario()==$id){
                if ($voto->getPositivo()==-1){
                    $votado=0;
                }
                else if ($voto->getPositivo()==1){
                    $votado=1;
                }
            }
            
            array_push($this->list, $voto);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        
        return $votado;
    }

    
    
    public function updateVoto(){
        $positivo=$this->getPositivo();
        $idFunding=$this->getIdFunding();
        $idUser=$this->getIdUsuario();
        $this->OpenConnect();  //Abrir conexión
        
        
        $sql = "CALL spUpdateVoto ($positivo,$idFunding, $idUser)"; //Sentencia SQL
     
        echo $sql;
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        
        $this->CloseConnect();
        
    }
    
    public function deleteVoto(){
        $idFunding=$this->getIdFunding();
        $idUser=$this->getIdUsuario();
        $this->OpenConnect();  //Abrir conexión
        
        
        $sql = "CALL spDeleteVoto ($idFunding, $idUser)"; //Sentencia SQL
        echo $sql;
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        
        $this->CloseConnect();
        
    }
    public function insertVoto(){
        $positivo=$this->getPositivo();
        $idFunding=$this->getIdFunding();
        $idUser=$this->getIdUsuario();
        $this->OpenConnect();  //Abrir conexión
        
        
        $sql = "CALL spInsertVoto ($positivo,$idUser, $idFunding)"; //Sentencia SQL

        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        
        $this->CloseConnect();
        
    }
  
    public function getList()
    {
        return $this->list;
    }



}
?>
