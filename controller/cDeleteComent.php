<?php
include_once('../model/comentarioModel.php');

$id = filter_input(INPUT_POST, "id");

$newComentario= new comentarioModel();
$newComentario->setId($id);

$newComentario->deleteComentario();