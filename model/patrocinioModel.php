<?php
include_once 'connect_data.php';
include_once 'patrocinioClass.php';

class patrocinioModel extends patrocinioClass {
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
        
        $sql = "CALL spAllPatrocinios()"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $patrocinio=new patrocinioModel();
            
            $patrocinio->setId($row['id']);
            $patrocinio->setidUsuario($row['idUsuario']);
            $patrocinio->setIdFunding($row['idFunding']);
            $patrocinio->setIdContribucion($row['idContribucion']);
            
            array_push($this->list, $patrocinio);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function insertPatrocinio() {
        $this->OpenConnect();
        
        $idUsuario=$this->getIdUsuario();
        $idFunding=$this->getIdFunding();
        $idContribucion=$this->getIdContribucion();
        
        $sql = "call  spInsertPatrocinio($idUsuario, $idFunding, $idContribucion)";
        
        if ($this->link->query($sql)>=1) { // insert egiten da
            return "El patrocinio se ha insertado con exito";
        }else {
            return "Fallï¿½ al insertar el patrocinio: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
}
?>