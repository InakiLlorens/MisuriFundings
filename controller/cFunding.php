<?php
include_once ('../model/crowdfundingModel.php');

$crowdfundings = new crowdfundingModel();
$crowdfundings->selectFundingById($_SESSION["idFunding"]);
$crowdfundings->countThisVotes();

echo json_encode($crowdfundings->getThisJsonString());
?>