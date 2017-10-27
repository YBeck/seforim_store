<?php

include_once 'utils/https.php';
include_once 'utils/autoload.php';  
if(empty($_GET['action'])){
    $action = 'home';
}
else{
    $action = $_GET['action'];
}

include "controllers/" . $action . "Controller.php";
?>