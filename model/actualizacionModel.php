<?php
include_once 'connect_data.php';
include_once 'actualizacionClass.php';

class actualizacionModel extends actualizacionClass {
    private $link;
    private $list=array();

    /**
     * @return multitype:
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param multitype: $list
     */
   

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
        
        $sql = "CALL spAllActualizaciones()"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $actualizacion=new actualizacionModel();
            
            $actualizacion->setId($row['id']);
            $actualizacion->setNombre($row['nombre']);
            $actualizacion->setDescripcion($row['descripcion']);
            $actualizacion->setFecha($row['fecha']);
            $actualizacion->setIdFunding($row['idFunding']);
            
            array_push($this->list, $actualizacion);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    public function setListByFundingId() {
        $this->OpenConnect();  //Abrir conexión
        $id=$this->getIdFunding();
        
        $sql = "CALL  spActualizacionesByIdFunding($id)"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $actualizacion=new actualizacionModel();
            
            $actualizacion->setId($row['id']);
            $actualizacion->setNombre($row['nombre']);
            $actualizacion->setDescripcion($row['descripcion']);
            $actualizacion->setFecha($row['fecha']);
            $actualizacion->setIdFunding($row['idFunding']);
            
            array_push($this->list, $actualizacion);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
}
?>
