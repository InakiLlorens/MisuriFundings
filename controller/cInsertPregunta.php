<?php
include_once('../model/preguntaModel.php');

$idFunding = filter_input(INPUT_POST, "id");
$pregunta = filter_input(INPUT_POST, "pregunta");
$respuesta = filter_input(INPUT_POST, "respuesta");

$newPregunta = new preguntaModel();

$newPregunta->setIdFunding($idFunding);
$newPregunta->setPregunta($pregunta);
$newPregunta->setRespuesta($respuesta);

$newPregunta->insertPregunta();

