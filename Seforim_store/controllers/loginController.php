<?php

if(isset($_POST['loginName'])){
    if(!empty($_POST['loginName'])){
        $loginName = $_POST['loginName'];
    }
}else{
    $loginName = "";
}

if(isset($_POST['loginPassword'])){
    if(!empty($_POST['loginPassword'])){
        $loginPassword = $_POST['loginPassword']; 
    }
}else{
    $loginPassword = "";
}
if(!isset($_POST['login']) || empty($loginName) || empty($loginPassword) || !empty($error)){
    $styles = ".error{border-color: red;}";
    $title = "Login";
    include_once 'views/top.php';
    include 'views/loginView.php';
    include_once 'views/top.php';
}else{
    include_once 'db.php';
    $db = new db();
    $con = $db->createDb();
    include 'models/loginModel.php';
}

if(isset($_GET['logout'])){
    include 'models/loginModel.php';
    header("Location:index.php?action=home");
}
?>