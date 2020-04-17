<?php

include_once '../model/votoModel.php';
$idUser = $_SESSION["id"];
$idFunding = filter_input(INPUT_POST, "idFunding");
$positivo = filter_input(INPUT_POST, "positivo");

$newVotos = new votoModel();
$newVotos->setIdUsuario($idUser);
$newVotos->setIdFunding($idFunding);
$newVotos->setPositivo($positivo);

$newVotos->insertVoto();