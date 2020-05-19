<?php
include_once 'connect_data.php';
include_once 'preguntaClass.php';

class preguntaModel extends preguntaClass {
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
     * @return mixed
     */

    /**
     * @param multitype: $list
     */

    /**
     * @param mixed $objUser
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
        
        $sql = "CALL spAllPreguntas()"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $pregunta=new preguntaModel();
            
            $pregunta->setId($row['id']);
            $pregunta->setPregunta($row['pregunta']);
            $pregunta->setRespuesta($row['respuesta']);
	        $pregunta->setIdFunding($row['idFunding']);
            
            array_push($this->list, $pregunta);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    public function setListByFundingId(){
        $this->OpenConnect();  //Abrir conexión
        $id = $this->getIdFunding();
        $sql = "CALL spPreguntasByFundingId($id)"; //Sentencia SQL
     
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $pregunta=new preguntaModel();
            
            $pregunta->setId($row['id']);
            $pregunta->setPregunta($row['pregunta']);
            $pregunta->setRespuesta($row['respuesta']);
            $pregunta->setIdFunding($row['idFunding']);
            
            
            
            array_push($this->list, $pregunta);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
}
?>
