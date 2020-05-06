<?php
include_once ("../model/crowdfundingModel.php");
include_once ('../model/errorObject.php');

$nombre = filter_input(INPUT_POST, "nombre");
$meta = filter_input(INPUT_POST, "meta");
$descripcion = filter_input(INPUT_POST, "descripcion");
$date = filter_input(INPUT_POST, "date");
$imagen = filter_input(INPUT_POST, "imagen");

$crowdfundingModel = new crowdfundingModel();

$crowdfundingModel->setNombre($nombre);
$crowdfundingModel->setDineroO($meta);
$crowdfundingModel->setDescripcion($descripcion);
$crowdfundingModel->setFechaFin($date);
$crowdfundingModel->setImagen($imagen);
$crowdfundingModel->insertFunding();
?>