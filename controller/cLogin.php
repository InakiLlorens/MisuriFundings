<?php
include_once ("../model/usuarioModel.php");
include_once ('../model/errorObject.php');
$username = filter_input(INPUT_POST, "user");
$password = filter_input(INPUT_POST, "pass");

$usuario = new usuarioModel();
$usuario->setUsuario($username);
$usuario->setContrasena($password);
if ($usuario->tryLogin()) {
    session_start();
    $_SESSION["user"]=$username;
    $_SESSION["password"]=$password;
    echo json_encode(errorObject::loginSuccess());
} else {
    echo json_encode(errorObject::loginError());
}

?>