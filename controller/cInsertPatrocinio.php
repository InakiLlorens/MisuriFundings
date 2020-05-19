<?php
session_start();

include_once ("../model/patrocinioModel.php");

$patrocinioModel = new patrocinioModel();

$patrocinioModel->setIdUsuario($_SESSION["id"]);
$patrocinioModel->setIdFunding($_SESSION["idFunding"]);
$patrocinioModel->setIdContribucion($_SESSION["idContribucion"]);

$owner = filter_input(INPUT_POST, "owner");
$cvv= filter_input(INPUT_POST, "cvv");
$number= filter_input(INPUT_POST, "number");
$mes= filter_input(INPUT_POST, "mes");
$year= filter_input(INPUT_POST, "year");



$patrocinioModel->insertPatrocinio();
?>