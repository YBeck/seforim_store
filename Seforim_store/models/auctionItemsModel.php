<?php
   if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
        require_once '../db.php';
    }
    $db = new DB();
    $con = $db->createDb();

    $amountPerPage = 4;
    $pageNumber = 1;
    if(isset($_GET['auctionPage'])){
        $pageNumber = $_GET['auctionPage'];
    }
   // print_r($result);

    try{
        $query = "SELECT c.id, c.productName, c.mainImage, c.startPrice,
            COALESCE(MAX(ab.cur_bid), c.startPrice) AS cur_bid
            FROM createauction c
            LEFT JOIN allbids ab ON ab.item_id = c.id
            WHERE c.endDay > NOW()
            GROUP BY c.id
            LIMIT :offset, $amountPerPage";
        $statement = $con->prepare($query);
        $statement->bindvalue('offset', (int)(($pageNumber -1) * $amountPerPage), PDO::PARAM_INT);
        $statement->execute();
        $items = $statement->fetchAll(PDO::FETCH_ASSOC);
       // $items[] = ['page' => $pageNumber];  //add page to the array to return  
         //echo json_encode($items);
    }catch(PDOException $e){
        echo 'Something went wrong ' . $e; 
    }
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            echo json_encode($items);
        }
?>