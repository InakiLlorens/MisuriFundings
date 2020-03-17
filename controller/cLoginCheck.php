<?php
session_start();

include_once ('../model/errorObject.php');

if (isset($_SESSION["user"]) && isset($_SESSION["password"])){
    echo json_encode(errorObject::logged());
}else {
    echo json_encode(errorObject::notLogged());
}
?>