<?php
$array="";
$updateArray = [];
if(isset($_POST['update'])){
    include_once 'utils/optionArray.php';
    $array = getArray($_POST['sefer']);
}else if(isset($_GET['update'])){
    $array = &$_GET; //set action to referance $_GET so we can unset it
}

if(isset($_GET['update']) || isset($_POST['update'])){
    $title = "Update";
    include_once 'utils/adminOnly.php';
    include_once 'models/filterModel.php';
    include_once 'views/updateView.php';
}

if(isset($_POST['updateForm'])){
    if(isset($_POST['seferName'])){
        if(!empty($_POST['seferName'])){
            $set = "name";
            $input  = $_POST['seferName'];
            $updateArray[$set] = $input;  
        }
    }
    if(isset($_POST['updatePrice'])){
        if(!empty($_POST['updatePrice']) && is_numeric($_POST['updatePrice'])){
            $set = "price";
            $input  = $_POST['updatePrice'];
            $updateArray[$set] = $input;
        }
    }
    if(isset($_POST['inStock'])){
        if(!empty($_POST['inStock']) && is_numeric($_POST['inStock'])){
            $set = "units_in_stock";
            $input  = $_POST['seferName'];
            $updateArray["units_in_stock"] = $_POST['inStock'];
        }
    }

    if(isset($_POST['updateCategory'])){
        if(!empty($_POST['updateCategory'])){
            $set = "category";
            $input  = $_POST['updateCategory'];
            $updateArray[$set] = $input;  
        }
    }

    if(isset($_POST['sefer'])){ //we need to pass in the values from $_POST['sefer'] again to the second form
        include_once 'utils/optionArray.php';
        $array = getArray($_POST['sefer']);  
    }
    $updateId = $array['id'];
    $title = "Update";
    include_once 'utils/adminOnly.php';
    include_once 'models/updateModel.php';
    include_once 'views/updateView.php';
}


if(isset($_GET['checkout']) || isset($_POST['placeOrder'])){
    if (session_id() == "")session_start(); 
    include_once 'utils/optionArray.php';
    $cartArray = getArray($_COOKIE['seferInfo']);
    $cart = Cart::getInstance();
    if(isset($_GET['checkout'])){
        $title = "Checkout";
        include_once 'views/checkout.php';
    }
    if(isset($_POST['placeOrder'])){
        if(!isset($_SESSION['customer'])){ //if not loged in
            header("Location:index.php?action=login");
        }
        
        $discount = 0;
        $title = "Checkout";
        include_once 'models/updateModel.php';
        include_once 'views/buyView.php'; 
    }

}

?>