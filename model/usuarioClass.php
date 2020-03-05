<?php
class usuarioClass {    
    protected $id;
    protected $nombre; //Nombre del propietario de la cuenta
    protected $apellido; //Apellido del propietario de la cuenta
    protected $usuario; //El usuario de acceso a la cuenta
    protected $contrasena; //La contraseña de la cuenta
    protected $email; //El correo electrónico del propietario
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getEmail() {
        return $this->email;
    } 

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setEmail($email) {
        $this->email = $email;
    }    

    function getObjectVars() {
        $vars=get_object_vars($this);
        return  $vars;
    } 
}
?>
