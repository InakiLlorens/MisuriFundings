cInsertFunding

<?php
include_once ("../model/crowdfundingModel.php");
include_once ("../model/comentarioModel.php");
include_once ("../model/votoModel.php");

$nombreFunding = filter_input(INPUT_POST, "nombreFunding");
$meta = filter_input(INPUT_POST, "meta");
$descripcionFunding = filter_input(INPUT_POST, "descripcionFunding");
$comentario = filter_input(INPUT_POST, "comentario");
$date = filter_input(INPUT_POST, "date");
$imagen = filter_input(INPUT_POST, "imagen");

$crowdfundingModel = new crowdfundingModel();

$crowdfundingModel->setNombre($nombreFunding);
$crowdfundingModel->setDineroO($meta);
$crowdfundingModel->setDescripcion($descripcionFunding);
$crowdfundingModel->setFechaFin($date);
$crowdfundingModel->setImagen($imagen);

$crowdfundingModel->insertFunding();
$idFunding=$crowdfundingModel->selectFundingByName($nombreFunding);

$comentarioModel = new comentarioModel();

$comentarioModel->setComentario($comentario);
$comentarioModel->setIdUsuario($_SESSION["id"]);
$comentarioModel->setIdFunding($idFunding);

$comentarioModel->insertComentario();

$votoModel = new votoModel();

$positivo = 0;

$votoModel->setPositivo($positivo);
$votoModel->setIdUsuario($_SESSION["id"]);
$votoModel->setIdFunding($idFunding);

$votoModel->insertVoto();

echo($idFunding);
?>