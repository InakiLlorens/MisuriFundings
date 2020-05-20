<?php
session_start();
include_once('../model/comentarioModel.php');

$idFunding = filter_input(INPUT_POST, "id");
$text = filter_input(INPUT_POST, "text");

$newComentario = new comentarioModel();

$newComentario->setIdFunding($idFunding);
$newComentario->setComentario($text);
$newComentario->setIdUsuario($_SESSION["id"]);
$newComentario->insertComentario();