<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
$_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
        // set the id to display the proper item in the auction
    $id = "";
    if(isset($_GET['id'])){
        if(!empty($_GET['id']) && is_numeric($_GET['id'])){
            $id = $_GET['id'];
        }
    }
    include_once '../db.php';
    $db = new DB();
    $con = $db->createDb();
    try{
        $select = "SELECT c.sellerId, c.userName,c.email, c.productName, c.title, 
            c.mainImage, c.subImg1, c.subImg2, c.subImg3, c.productCondition, 
            c.description, c.startPrice, c.days, c.startDay, c.endDay
            FROM createauction c WHERE c.id = :id";
        $prepare = $con->prepare($select);
        $prepare->bindvalue('id', (int)$id, PDO::PARAM_INT);
        $prepare->execute();
        $results = $prepare->fetchAll(PDO::FETCH_ASSOC);
        //print_r($results);
    }catch(PDOException $e){
        'Something went wrong '. $e;
    }
    echo json_encode($results);
}
?>