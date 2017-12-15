<?php
    $db = new DB();
    $con = $db->createDb();

    try{
        $query = 'SELECT id, productName, mainImage FROM createauction';
        $statement = $con->query($query);
        $items = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($items);
    }catch(PDOException $e){
        echo 'Something went wrong ' . $e;
    }
?>