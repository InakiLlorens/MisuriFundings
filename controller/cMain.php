<?php
include_once ('../model/crowdfundingModel.php');
$crowdfundings = new crowdfundingModel();
$crowdfundings->setList();

$crowdfundings->countVotes();
echo json_encode($crowdfundings->getListJsonString());