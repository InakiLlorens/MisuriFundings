<?php
session_start();

include_once ("../model/contribucionModel.php");

$nombreContribucion = filter_input(INPUT_POST, "nombreContribucion");
$precio = filter_input(INPUT_POST, "precio");
$descripcionContribucion = filter_input(INPUT_POST, "descripcionContribucion");
$recompensa = filter_input(INPUT_POST, "recompensa");

$contribucionModel = new contribucionModel();

$contribucionModel->setNombre($nombreContribucion);
$contribucionModel->setPrecio($precio);
$contribucionModel->setDescripcion($descripcionContribucion);
$contribucionModel->setRecompensa($recompensa);
$contribucionModel->setIdFunding($_SESSION["idFunding"]);

$contribucionModel->insertContribucion();

echo($_SESSION["idFunding"]);
?>