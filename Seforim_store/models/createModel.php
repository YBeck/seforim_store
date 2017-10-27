<?php

$insert = "INSERT INTO customers (first_name, last_name, email, address, city, state, zip,
                phone) VALUES (:first, :last, :email, :add, :city,
                :state, :zip, :phone)";

    $statement = $con->prepare($insert);
    $statement-> bindvalue('first', $firstName);
    $statement-> bindvalue('last', $lastName);
    $statement-> bindvalue('email', $email);
    $statement-> bindvalue('add', $address);
    $statement-> bindvalue('city', $city);
    $statement-> bindvalue('state', $state);
    $statement-> bindvalue('zip', $zip);
    $statement-> bindvalue('phone', $phone);
    $statement -> execute();

    // get the user id 
$select = "SELECT id FROM customers ORDER BY id DESC LIMIT 1";
$statement = $con->prepare($select);
$statement -> execute();
$custId = $statement -> fetch(PDO::FETCH_COLUMN);


// insert into userPassword
 $insert = "INSERT INTO userPassword (cust_id, user_name, password, admin)
            VALUES (:ID, :cust, :pass, :admin)";
    $statement = $con->prepare($insert);
    $statement-> bindvalue('ID', (int)$custId, PDO::PARAM_INT);
    $statement-> bindvalue('cust', $userName);
    $statement-> bindvalue('pass', $hash);
    $statement-> bindvalue('admin', $admin);
    $statement-> execute();
?>