<?php
include_once 'connect_data.php';
include_once 'comentarioClass.php';

class comentarioModel extends comentarioClass {
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
        
        $sql = "CALL spAllComentarios()"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $comentario=new comentarioModel();
            
            $comentario->setId($row['id']);
            $comentario->setComentario($row['comentario']);
            $comentario->setIdUsuario($row['idUsuario']);
	          $comentario->setIdFunding($row['idFunding']);
            
            array_push($this->list, $comentario);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
}
?>
