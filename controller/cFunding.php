<?php
include_once ('../model/crowdfundingModel.php');

$crowdfundings = new crowdfundingModel();
$crowdfundings->selectFundingById($_SESSION["idFunding"]);

echo json_encode($crowdfundings->getListJsonStringSimple());
?>