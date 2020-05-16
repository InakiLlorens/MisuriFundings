<?php
include_once ("../model/contribucionModel.php");
include_once ("../model/crowdfundingModel.php");

$nombreContribucion = filter_input(INPUT_POST, "nombreContribucion");
$precio = filter_input(INPUT_POST, "precio");
$descripcionContribucion = filter_input(INPUT_POST, "descripcionContribucion");
$recompensa = filter_input(INPUT_POST, "recompensa");
$nombreFunding = filter_input(INPUT_POST, "nombreFunding");

$contribucionModel = new contribucionModel();

$contribucionModel->setNombre($nombreContribucion);
$contribucionModel->setPrecio($precio);
$contribucionModel->setDescripcion($descripcionContribucion);
$contribucionModel->setRecompensa($recompensa);

$contribucionModel->insertContribucion();

$crowdfundingModel = new crowdfundingModel();

$idFunding=$crowdfundingModel->selectFundingByName($nombreFunding);

echo($idFunding);
?>