<?php
    require_once 'db.php';
    $db = new db();
    $con = $db->createDb();

    if(isset($_POST['updateForm'])){
        foreach($updateArray as $key=>$value){
            $query = "UPDATE seforim SET $key = :value 
                WHERE id = :id";
            $statement = $con->prepare($query);
            if(is_numeric($value)){
                $statement-> bindvalue('value', (int) $value, PDO::PARAM_INT);
            }else{
                $statement-> bindvalue('value', $value);
            }
            $statement-> bindvalue('id', (int)$updateId, PDO::PARAM_INT);
            $statement-> execute(); 
        }
    }

    if(isset($_POST['placeOrder'])){
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){

            // insert into the orders table
            $order = "INSERT INTO orders (customer_id, order_date)
                VALUES (:cust, :orderDate)";
            $statement = $con->prepare($order) or trigger_error($mysqli->error."[$sql]");
            $statement-> bindvalue('cust', $_SESSION['customer']['id']);
            $statement-> bindvalue('orderDate', date('Y-m-d G:i:s'));
            $statement-> execute();

            //get the order id (which is the last one entered)
            //so that it can be entered in order_details
            $select = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1";
            $statement = $con->prepare($select);
            $statement -> execute();
            $orderId = $statement -> fetch(PDO::FETCH_COLUMN); 

            foreach ($_SESSION['cart'] as $theCart){ // loop through the seforim ordered
                for($i=0; $i < $theCart['quantity']; $i++){ // loop through the quantity
                    $query = "UPDATE seforim SET units_in_stock = units_in_stock -1 
                        WHERE id = :id";
                    $statement = $con->prepare($query);
                    $statement-> bindvalue('id', (int)$theCart['id'], PDO::PARAM_INT);
                    $statement-> execute();
                }

                //insert into the order_deatails table every item with the order id
                $insert = "INSERT INTO order_details (order_id, product_id, quantity, discount)
                    VALUES (:orderID, :product_id, :quantity, :discount)";
                    $statement = $con->prepare($insert);
                    $statement-> bindvalue('orderID', (int)$orderId, PDO::PARAM_INT);
                    $statement-> bindvalue('product_id', (int)$theCart['id'], PDO::PARAM_INT);
                    $statement-> bindvalue('quantity', (int)$theCart['quantity'], PDO::PARAM_INT);
                    $statement-> bindvalue('discount', (int)$discount, PDO::PARAM_INT);
                    $statement-> execute();
            }
        }
    }
?>