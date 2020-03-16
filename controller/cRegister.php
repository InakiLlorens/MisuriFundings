<?php
include_once ("../model/usuarioModel.php");
include_once ('../model/errorObject.php');
$nombre = filter_input(INPUT_POST, "nombre");
$apellido = filter_input(INPUT_POST, "apellido");
$usuario = filter_input(INPUT_POST, "usuario");
$contrasena = filter_input(INPUT_POST, "contrasena");
$email = filter_input(INPUT_POST, "email");

$userModel = new usuarioModel();

$userModel->setNombre($nombre);
$userModel->setApellido($apellido);
$userModel->setUsuario($usuario);
$userModel->setContrasena($contrasena);
$userModel->setEmail($email);
$userModel->insertUser();
