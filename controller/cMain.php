<?php
include_once ('../model/crowdfundingModel.php');
$crowdfundings = new crowdfundingModel();
$crowdfundings->setList();
echo json_encode($crowdfundings->getListJsonString());