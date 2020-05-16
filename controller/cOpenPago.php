<?php
session_start();

$idContribucion = filter_input(INPUT_POST, "idcontribucion");

$_SESSION["idContribucion"]=$idContribucion;

echo json_encode($vars["idContribucion"]=$_SESSION["idContribucion"]);
?>