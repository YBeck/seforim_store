<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
        require_once '../db.php';
    $db = new DB();
    $con = $db->createDb();
    try{
        $select = "SELECT COUNT(id) FROM createauction
            WHERE endDay > NOW()";
        $q = $con->query($select);
        $result = $q->fetch(PDO::FETCH_COLUMN);
    }catch(PDOException $e){
        echo json_encode('Something went wrong ' . $e);
    }

    echo json_encode($result);
}
?>