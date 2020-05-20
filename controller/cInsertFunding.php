<?php
include_once ("../model/crowdfundingModel.php");
include_once ("../model/votoModel.php");

$nombreFunding = filter_input(INPUT_POST, "nombreFunding");
$meta = filter_input(INPUT_POST, "meta");
$descripcionFunding = filter_input(INPUT_POST, "descripcionFunding");
$date = filter_input(INPUT_POST, "date");
$filename=filter_input(INPUT_POST, 'filename');
$savedFileBase64=filter_input(INPUT_POST, 'savedFileBase64');

$crowdfundingModel = new crowdfundingModel();

$crowdfundingModel->setNombre($nombreFunding);
$crowdfundingModel->setDineroO($meta);
$crowdfundingModel->setDescripcion($descripcionFunding);
$crowdfundingModel->setFechaFin($date);
$crowdfundingModel->setImagen($filename);
$crowdfundingModel->setIdUsuario($_SESSION["id"]);

$crowdfundingModel->insertFunding();

/*Llega $_POST["savedFileBase64"] ==> 'data:image/png;base64,AAAFBfj42Pj4...';
 Se obtiene el contenido limpio del fichero, sin cabecera de tipo de archivo*/
$fileBase64 = explode(',', $savedFileBase64)[1];

// Se convierte de base64 a binario/texto para almacenarlo
$file = base64_decode($fileBase64);

/*Se especifica el directorio donde se almacenarán los ficheros(se crea si no existe)*/
$writable_dir = '../view/uploads/';
if(!is_dir($writable_dir)){mkdir($writable_dir);}

//Se escribe el archivo
file_put_contents($writable_dir.$filename, $file,  LOCK_EX);

$idFunding=$crowdfundingModel->selectFundingByName($nombreFunding);

$_SESSION["idFunding"]=$idFunding;

$votoModel = new votoModel();

$positivo = 0;

$votoModel->setPositivo($positivo);
$votoModel->setIdUsuario($_SESSION["id"]);
$votoModel->setIdFunding($idFunding);

$votoModel->insertVoto();

echo($idFunding);
?>