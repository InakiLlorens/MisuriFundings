<?php
include_once('../model/preguntaModel.php');

$id = filter_input(INPUT_POST, "id");
$pregunta = filter_input(INPUT_POST, "pregunta");
$respuesta = filter_input(INPUT_POST, "respuesta");

$newPregunta = new preguntaModel();

$newPregunta->setId($id);
$newPregunta->setPregunta($pregunta);
$newPregunta->setRespuesta($respuesta);
$newPregunta->updatePregunta();
