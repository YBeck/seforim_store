<?php
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
        include_once '../db.php';
        if (session_id() == "")session_start();
        $errors['error'] = [];
        $validImgExt = ['jpeg', 'pjpeg','png', 'jpg'];
        $newFileNames =[]; 
     
        //print_r($_FILES['items_pic']);
        if(isset($_FILES["items_pic"])){
            if(!empty($_FILES["items_pic"])){
                if(count($_FILES["items_pic"]['name']) !== 4){
                    $errors['error'][] = 'Please submit 4 images';
                }
                foreach ($_FILES["items_pic"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["items_pic"]["tmp_name"][$key];
                        $cur_name = $_FILES["items_pic"]["name"][$key];
                        $extension = pathinfo($_FILES['items_pic']['name'][$key], PATHINFO_EXTENSION );
                        if(!in_array(strtolower($extension), $validImgExt)){
                            $errors['error'][] = '.' . $extension . ' Is not a valid file type. Please enter a valid image';
                        }
                        if ($_FILES["items_pic"]["size"][$key] > 500000) {
                            $errors['error'][] = "Sorry, " . $_FILES["items_pic"]["name"][$key]." is too large.";
                        }
                        $newName = 'images/' . uniqid($key) . '.' . $extension;
                        $newFileNames[] = $newName;
                        move_uploaded_file($tmp_name, "C:/xampp/htdocs/seforim_store/Seforim_store/$newName");
                    }else{
                        $errors['error'][] = 'There was an error loading '. $_FILES["items_pic"]["name"][$key];
                    }
                }
                //print_r($_SERVER);

                function getPost($param){
                    global $errors;
                    $value = "";
                    if(isset($_POST[$param]) && !empty($_POST[$param])){
                        $value = $_POST[$param];
                    }else{
                        $errors['error'][] = $param . ' is a required field';
                    }
                    return $value;
                }
            }
        }
            // seller info to store in database.
        $sellerId = $_SESSION['customer']['id'];
        $productName = getPost('productName');
        $title = getPost('title');
        $firstImg = isset($newFileNames[0]) ? $newFileNames[0] : "";
        $secondImg = isset($newFileNames[1]) ? $newFileNames[1] : "";
        $thirdImg = isset($newFileNames[2]) ? $newFileNames[2] : "";
        $fourthImg = isset($newFileNames[3]) ? $newFileNames[3] : "";
        $condition = getPost('condition');
        $description = getPost('description');
        $startPrice = getPost('startPrice');
        $days = getPost('days'); 

        // $temp = [$productName, $title,$firstImg,  $secondImg, $thirdImg, $fourthImg,  $condition,
        //     $description, $startPrice, $days];
        //print_r($temp);
        if($days > 10 || $days < 1){
            $errors['error'][] = 'Auction must be between 1 and 10 days';
        }
        if(!empty($errors['error'])){
            echo json_encode($errors);
            exit;
        }
        $db = new DB();
        $con = $db->createDb();
        //echo json_encode($temp);
        try{
            $insert = "INSERT INTO createAuction (sellerId, productName, title, 
                mainImage, subImg1, subImg2, subImg3, 
                productCondition, description, startPrice, days, startDay, endDay)
                VALUES (:sellerId, :productName,:title, :mainImage, :subImg1, 
                :subImg2, :subImg3, :condition, :description,:startPrice, 
                :days, NOW(), DATE_ADD(NOW(), INTERVAL :endDay DAY))";
                $prepare = $con->prepare($insert);
                $prepare->bindvalue('sellerId', (int)$sellerId, PDO::PARAM_INT);
                $prepare->bindvalue('productName', $productName);
                $prepare->bindvalue('title', $title);
                $prepare->bindvalue('mainImage',$firstImg);
                $prepare->bindvalue('subImg1', $secondImg);
                $prepare->bindvalue('subImg2', $thirdImg);
                $prepare->bindvalue('subImg3', $fourthImg);
                $prepare->bindvalue('condition', $condition);
                $prepare->bindvalue('description', $description);
                $prepare->bindvalue('startPrice', (int)$startPrice, PDO::PARAM_INT);
                $prepare->bindvalue('days', (int)$days, PDO::PARAM_INT);
                $prepare->bindvalue('endDay', (int)$days, PDO::PARAM_INT);
                $rows = $prepare->execute();
                //echo json_encode($rows . ' rows entered');

        }catch(PDOException $e){
            echo json_encode('Something went wrong' . $e);
        }
    }

?>