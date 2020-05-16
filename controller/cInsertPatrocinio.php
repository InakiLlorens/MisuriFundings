<?php
session_start();

include_once ("../model/patrocinioModel.php");

$patrocinioModel = new patrocinioModel();

$patrocinioModel->setIdUsuario($_SESSION["id"]);
$patrocinioModel->setIdFunding($_SESSION["idFunding"]);
$patrocinioModel->setIdContribucion($_SESSION["idContribucion"]);

$patrocinioModel->insertPatrocinio();
?>