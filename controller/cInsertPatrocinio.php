<?php
session_start();

include_once ("../model/patrocinioModel.php");

$owner = filter_input(INPUT_POST, "owner");
$cvv= filter_input(INPUT_POST, "CVV");
$number= filter_input(INPUT_POST, "number");
$date= filter_input(INPUT_POST, "date");

$patrocinioModel = new patrocinioModel();

$patrocinioModel->setIdUsuario($_SESSION["id"]);
$patrocinioModel->setIdFunding($_SESSION["idFunding"]);
$patrocinioModel->setIdContribucion($_SESSION["idContribucion"]);
$patrocinioModel->setCVV($cvv);
$patrocinioModel->setNumero($number);
$patrocinioModel->setFechaCad($date);
$patrocinioModel->setTitular($owner);

$patrocinioModel->insertPatrocinio();

echo ($number);
?>