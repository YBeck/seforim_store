<?php
    include_once '../db.php';
    if (session_id() == "")session_start();
    $db = new DB();
    $con = $db->createDb();
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
        //print_r($_SERVER);
        // seller info to store in database.
        $sellerId = $_SESSION['customer']['id'];
        $userName = $_SESSION['customer']['user_name'];
        $email = $_SESSION['customer']['email'];
        $errors = [];

        function getPost($param){
            global $errors;
            $value = "";
            if(isset($_POST[$param]) && !empty($_POST[$param])){
                $value = $_POST[$param];
            }else{
                $errors[] = $param . ' is a required field';
            }
            return $value;
        }

        $productName = getPost('productName');
        $title = getPost('title');
        $mainImg = getPost('mainImg');
        $subImg1 = getPost('subImg1');
        $subImg2 = getPost('subImg2');
        $subImg3 = getPost('subImg3');
        $condition = getPost('condition');
        $description = getPost('description');
        $startPrice = getPost('startPrice');
        $days = getPost('days'); 

        $temp = [$productName, $title, $mainImg,  $subImg1, $subImg2, $subImg3,  $condition,
            $description, $startPrice, $days];

       
        if(!empty($errors)){
            echo json_encode($errors);
            exit;
        }

        //echo json_encode($temp);
        try{
            $insert = "INSERT INTO createAuction (sellerId, userName,
             email, productName, title, mainImage, subImg1, subImg2, subImg3, 
             productCondition, description, startPrice, days, startDay, endDay)
             VALUES (:sellerId, :userName, :email, :productName,
                :title, :mainImage, :subImg1, :subImg2, :subImg3, :condition, :description,
                :startPrice, :days, NOW(), :endDay)";
                $prepare = $con->prepare($insert);
                $prepare->bindvalue('sellerId', (int)$sellerId, PDO::PARAM_INT);
                $prepare->bindvalue('userName', $userName);
                $prepare->bindvalue('email', $email);
                $prepare->bindvalue('productName', $productName);
                $prepare->bindvalue('title', $title);
                $prepare->bindvalue('mainImage', $mainImg);
                $prepare->bindvalue('subImg1', $subImg1);
                $prepare->bindvalue('subImg2', $subImg2);
                $prepare->bindvalue('subImg3', $subImg3);
                $prepare->bindvalue('condition', $condition);
                $prepare->bindvalue('description', $description);
                $prepare->bindvalue('startPrice', (int)$startPrice, PDO::PARAM_INT);
                $prepare->bindvalue('days', (int)$days, PDO::PARAM_INT);
                $prepare->bindvalue('endDay', 'DATE_ADD(NOW(), INTERVAL ' . $days . ' DAY');
                $rows = $prepare->execute();
                echo $rows . ' rows entered';

        }catch(PDOException $e){
            echo 'Something went wrong' . $e;
        }
    }

?>