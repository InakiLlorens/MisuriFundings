<?php
include_once 'connect_data.php';
include_once 'crowdfundingClass.php';

class crowdfundingModel extends crowdfundingClass {
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
            
            array_push($this->list, $funding);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
}
?>
