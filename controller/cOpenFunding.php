<?php
session_start();

$idFunding = filter_input(INPUT_GET, "idFunding");

$_SESSION["idFunding"]=$idFunding;

echo json_encode($vars["idFunding"]=$_SESSION["idFunding"]);
?>