<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
$_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
    if (session_id() == "")session_start();
    $cust_id = !empty($_SESSION['customer']['id']) ? $_SESSION['customer']['id']: "";
    $productId = "";
    $bidAmount = "";
    $amountToBid = "";
    $currentMax = "";
    $errors['error'] = []; //declear an array with key error

    //only a customer thats loged in can bid
    if(empty($cust_id)){
        $errors['error'][] = "Login required to place a bid";
    }
    if(isset($_POST['productId'])){
        if(!empty($_POST['productId']) && is_numeric($_POST['productId'])){
            $productId = $_POST['productId'];
        }
    }

    if(isset($_POST['amountToBid'])){
        if(!empty($_POST['amountToBid']) && is_numeric($_POST['amountToBid'])){
            $amountToBid = $_POST['amountToBid'];
        }
    }

    if(isset($_POST['amount'])){
        if(!empty($_POST['amount']) && is_numeric($_POST['amount'])){
            $bidAmount = $_POST['amount'];
        }
    }

    if($bidAmount < $amountToBid){
        $errors['error'][] = "Please enter an amount of " . $amountToBid . " or greater";
    }
    include_once '../db.php';
    $db = new DB();
    $con = $db->createDb();

    if(empty($errors['error']) && !empty($bidAmount) && !empty($amountToBid) &&
        !empty($cust_id) && !empty($productId)){
        try{
            $select = "SELECT MAX(max_bid) FROM bid
                WHERE item_id = :id";
            $prepare = $con->prepare($select);
            $prepare->bindvalue('id', (int)$productId, PDO::PARAM_INT);
            $prepare->execute();
            $currentMax = $prepare->fetch(PDO::FETCH_COLUMN);
        }catch(PDOException $e){
            echo 'Something went wrong with select max '. $e;
        }

        try{
            $insert = "INSERT INTO bid (cust_id, bid_time,max_bid, item_id) 
                VALUES (:cust, NOW(),:max, :itemId)";
            $statement = $con->prepare($insert);
            $statement->bindvalue('cust', (int)$cust_id , PDO::PARAM_INT);
            $statement->bindvalue('max', $bidAmount);
            $statement->bindvalue('itemId', (int)$productId , PDO::PARAM_INT);
            $statement->execute();
        }catch(PDOException $e){
            echo 'Something went wrong with insert into bid '. $e;
        }
        try{
            $insert2 = "INSERT INTO allbids (item_id, cur_bid) 
            VALUES (:item, :bid)";
            $statement2 = $con->prepare($insert2);
            $statement2->bindvalue('item', (int)$productId, PDO::PARAM_INT);
            if(!$currentMax){ //if it's the first bid
                $statement2->bindvalue('bid', $amountToBid);
            }else if($bidAmount > $currentMax){
                $statement2->bindvalue('bid', $currentMax +1);
            }else if($bidAmount == $currentMax){
                $statement2->bindvalue('bid', $bidAmount);
            }else{
                $statement2->bindvalue('bid', $bidAmount +1);
            }
            $statement2->execute();
        }catch(PDOException $e){
            echo 'Something went wrong with insert into allbids '. $e;
        }
    }else {
       echo json_encode($errors);
    //    echo json_encode(['error', $errors, 'cust id', $cust_id, 'bid amount',  $bidAmount,
    //     'product id', $productId]);
        exit();
    }
   // echo json_encode($results);
}
?>