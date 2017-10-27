<?php
session_start();
    include_once 'utils/optionArray.php';
    //include_once 'cart.php';

if(isset($_POST['cart'])){ //if it's coming from the home view
    setcookie("seferInfo", $_POST['sefer']); //store value in a cookie
}else if(isset($_GET['cart'])){ //if it's coming from the table view
    setcookie("seferInfo", "sefer_name={$_GET['sefer_name']}|id={$_GET['id']}
        |price={$_GET['price']}|currentPage=table"); //store value in a cookie, with a string that we can later
        //call getArray().
}
 if(isset($_GET['cart']) || isset($_POST['cart'])){ 
    include 'views/top.php';
    include 'views/cartForm.php';
    include 'views/bottom.php';
}else{
    if(isset($_COOKIE['seferInfo'])){
        $cartArray = getArray($_COOKIE['seferInfo']); //pass in the sefer from cookie to get a array
    }
    if(isset ($_POST['quantity'])){
        $props = [];
        $amount = $_POST['quantity'];
        $itemName = $cartArray['sefer_name']; //name from the cookie
        $itemId = $cartArray['id']; //id from the cookie
        $price = $cartArray['price']; //price from the cookie
        include_once 'models/cartModel.php';
        header("Location:index.php?action={$cartArray['currentPage']}");
    }

    if(isset($_GET['editName'])){
        $editName = $_GET['editName'];
        $editQuantity = $_GET['editQuantity'];
    }

    if(isset($_GET['remove'])){
        $remove = $_GET['remove'];
    }

    if(isset($_POST['editItem']) && isset($_POST['editAmount'])){
        $item = $_POST['editItem'];
        $newAmount = $_POST['editAmount'];
    }
    $styles = ".inline{display: inline;}"; 
    include_once 'views/top.php';
    include_once 'models/cartModel.php';
    include_once 'views/cartView.php';
    include_once 'views/bottom.php';
}
?>