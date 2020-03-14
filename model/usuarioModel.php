<?php
include_once 'connect_data.php';
include_once 'usuarioClass.php';

class usuarioModel extends usuarioClass {
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
        
        $sql = "CALL spAllUsuarios()"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $usuario=new usuarioModel();
            
            $usuario->setId($row['id']);
            $usuario->setNombre($row['nombre']);
            $usuario->setApellido($row['apellido']);
            $usuario->setUsuario($row['usuario']);
            $usuario->setContrasena($row['contrasena']);
            $usuario->setEmail($row['email']);
            
            array_push($this->list, $usuario);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function tryLogin() {
        $this->OpenConnect();  //Abrir conexión
        $name =$this->getUsuario();
        $contrasena= $this->getContrasena();
        $sql = "CALL spLogin('$name', '$contrasena')"; //Sentencia SQL
        
        $result = $this->link->query($sql); //Se guarda la información solicitada a la bbdd
       
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $this->setId($row['id']);
            $this->setNombre($row['nombre']);
            $this->setApellido($row['apellido']);
            $this->setUsuario($row['usuario']);
            $this->setContrasena($row['contrasena']);
            $this->setEmail($row['email']);
            return true;
        }
        else{
            return false;
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
  
}
?>
