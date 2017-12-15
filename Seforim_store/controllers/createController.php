<?php
    $firstName = "";
    $lastName = "";
    $email = "";
    $address = "";
    $city = "";
    $state = "";
    $zip = "";
    $phone = "";
    $userName = "";
    $password = "";
    $hash = "";
    $password2 = "";
    $admin = 0;
    $errors = [];

    if(isset($_POST['firstName'])){
        if(!empty($_POST['firstName'])){
            $firstName = $_POST['firstName'];
        }else{
            $errors[] = "First Name";
        }
    }
    if(isset($_POST['lastName'])){
        if(!empty($_POST['lastName'])){
            $lastName = $_POST['lastName'];
        }else{
            $errors[] = "Last Name";
        }
    }
    if(isset($_POST['email'])){
        if(!empty($_POST['email'])){
            $email = $_POST['email'];
        }else{
            $errors[] = "Email";
        }
    }
    if(isset($_POST['address'])){
        if(!empty($_POST['address'])){
            $address = $_POST['address'];
        }else{
            $errors[] = "Address";
        }
    }
    if(isset($_POST['city'])){
        if(!empty($_POST['city'])){
            $city = $_POST['city'];
        }else{
            $errors[] = "City";
        }
    }
    if(isset($_POST['state'])){
        if(!empty($_POST['state'])){
            $state = $_POST['state'];
        }else{
            $errors[] = "State";
        }
    }
    if(isset($_POST['zip'])){
        if(!empty($_POST['zip'])){
            $zip = $_POST['zip'];
        }else{
            $errors[] = "Zip";
        }
    }
    if(isset($_POST['phone'])){
        if(!empty($_POST['phone'])){
            $phone = $_POST['phone'];
        }else{
            $errors[] = "Phone Number";
        }
    }
    if(isset($_POST['userName'])){
        if(!empty($_POST['userName'])){
            $userName = $_POST['userName'];
        }else{
            $errors[] = "User Name";
        }
    }
    if(isset($_POST['password'])){
        if(!empty($_POST['password']) && $_POST['password'] === $_POST['password2']){
            $password = $_POST['password'];
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else{
            $errors[] = "Password";
        }
    }
    if(isset($_POST['password2'])){
        if(!empty($_POST['password2']) && $_POST['password2'] === $_POST['password']){
            $password2 = $_POST['password2'];
        }else{
            $errors[] = "password";
        }
    }

    if(!isset($_POST['customerForm']) || empty($firstName) || empty($lastName) || empty($email)
        || empty($address) || empty($city) || empty($state) ||empty($zip) || empty($phone)
        || empty($password) || empty($password2)){
            $styles = ".error{border-color: red;}";
            $title = "Create Account";
            include 'views/top.php';
            include 'views/createView.php';
            include 'views/bottom.php';
        }else{
            include 'db.php';
            $db = new DB();
            $con = $db->createDb();
            include 'models/createModel.php';
            header("Location:index.php?action=home");
        }

?>