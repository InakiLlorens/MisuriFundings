<?php
include_once 'connect_data.php';
include_once 'comentarioClass.php';
include_once 'usuarioModel.php';

class comentarioModel extends comentarioClass {
    private $link;
    private $list=array();
    private $objUser;
    
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
    public function setListByIdFunding(){
        $this->OpenConnect();  //Abrir conexión
        $id = $this->getIdFunding();
        $sql = "CALL spComentariosByIdFunding($id)"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $comentario=new comentarioModel();
            
            $comentario->setId($row['id']);
            $comentario->setComentario($row['comentario']);
            $comentario->setIdUsuario($row['idUsuario']);
            $comentario->setIdFunding($row['idFunding']);
            
            $newUser= new usuarioModel();
            $newUser->setId($comentario->getIdUsuario());
            $newUser->setUserById();
            $comentario->setObjUser($newUser);
            
            
            array_push($this->list, $comentario);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    
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
    public function getObjUser()
    {
        return $this->objUser;
    }

    /**
     * @param mixed $objUser
     */
    public function setObjUser($objUser)
    {
        $this->objUser = $objUser;
    }

    public function insertComentario() {
        $this->OpenConnect();
        
        $comentario=$this->getComentario();
        $idUsuario=$this->getIdUsuario();
        $idFunding=$this->getIdFunding();
        
        $sql = "call  spInsertComentario('$comentario', $idUsuario, $idFunding)";

        if ($this->link->query($sql)>=1) { // insert egiten da
            return "El comentario se ha insertado con exito";
        }else {
            return "Fallï¿½ al insertar el comentario: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
}
?>