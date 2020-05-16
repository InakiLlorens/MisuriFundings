<?php
include_once 'connect_data.php';
include_once 'contribucionClass.php';

class contribucionModel extends contribucionClass {
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
        
        $sql = "CALL spAllContribuciones()"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $contribucion=new contribucionModel();
            
            $contribucion->setId($row['id']);
            $contribucion->setNombre($row['nombre']);
            $contribucion->setPrecio($row['precio']);
            $contribucion->setDescripcion($row['descripcion']);
            $contribucion->setRecompensas($row['recompensas']);
            
            array_push($this->list, $contribucion);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function insertContribucion() {
        $this->OpenConnect();
        
        $nombre=$this->getNombre();
        $precio=$this->getPrecio();
        $descripcion=$this->getDescripcion();
        $recompensa=$this->getRecompensa();
        
        $sql = "call  spInsertContribucion('$nombre', $precio, '$descripcion', '$recompensa')";
        
        if ($this->link->query($sql)>=1) { // insert egiten da
            return "La contribucion se ha insertado con exito";
        }else {
            return "Fallï¿½ al insertar la contribucion: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
}
?>