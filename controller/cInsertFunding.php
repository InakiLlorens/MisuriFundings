<?php
include_once ("../model/crowdfundingModel.php");
include_once ("../model/comentarioModel.php");

$nombre = filter_input(INPUT_POST, "nombre");
$meta = filter_input(INPUT_POST, "meta");
$descripcion = filter_input(INPUT_POST, "descripcion");
$comentario = filter_input(INPUT_POST, "comentario");
$date = filter_input(INPUT_POST, "date");
$imagen = filter_input(INPUT_POST, "imagen");

$crowdfundingModel = new crowdfundingModel();

$crowdfundingModel->setNombre($nombre);
$crowdfundingModel->setDineroO($meta);
$crowdfundingModel->setDescripcion($descripcion);
$crowdfundingModel->setFechaFin($date);
$crowdfundingModel->setImagen($imagen);

$crowdfundingModel->insertFunding();
$idFunding=$crowdfundingModel->selectFundingByName($nombre);

$comentarioModel = new comentarioModel();

$comentarioModel->setComentario($comentario);
$comentarioModel->setIdUsuario($_SESSION["id"]);
$comentarioModel->setIdFunding($idFunding);

$comentarioModel->insertComentario();

echo($idFunding);
?>