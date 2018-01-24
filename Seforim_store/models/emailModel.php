<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
        require_once '../db.php';
        $item = "";
        if(!empty($_POST['item']) && is_numeric($_POST['item'])){
            $item = $_POST['item'];
        }

        if(!empty($item)){
            $db = new DB();
            $con = $db->createDb();
            try{
                $select = 'SELECT cr.productName, MAX(ab.cur_bid) AS winning_bid,
                 c.first_name, c.last_name, c.email
                FROM createauction cr 
                JOIN allbids ab ON ab.item_id = cr.id
                JOIN bid b ON b.item_id = ab.item_id
                JOIN customers c ON c.id = b.cust_id
                WHERE ab.item_id = :id AND b.max_bid = 
                    (SELECT MAX(bi.max_bid)
                    FROM bid bi
                    WHERE bi.item_id = :id)
                    AND b.bid_time = 
                    (SELECT MAX(bii.bid_time)
                    FROM bid bii
                    WHERE bii.item_id = 9)';
                $prepare = $con->prepare($select);
                $prepare->bindvalue('id', (int)$item, PDO::PARAM_INT);
                $prepare->execute();
                $results = $prepare->fetch(PDO::FETCH_ASSOC);
                //echo json_encode($results);
            }catch(PDOException $e){
                echo json_encode('something went wrong ' . $e);
            }
            if(!empty($results['winning_bid'])){ //only if there was a bid
                $to = $results["email"];
                $subject = 'Your bid on ' . $results["productName"];
                $msg = '<html>
                    <head>
                    <title>Online Auction</title>
                    </head>
                    <body>
                    <h1 style="text-align: center;">Winning bid confirmation</h1>
                    <p>Dear ' . $results["first_name"] . ' ' .$results["last_name"] .',</br>
                        &nbsp;This is to inform you that your bid on ' .  $results["productName"].' was excepted.
                        </br>You will be charged the amount of '. $results["winning_bid"] . ', as
                        that was the final bid.</p>
                    <table>
                    <tr>
                    <th>Item</th>
                    <th>Price</th>
                    </tr>
                    <tr>
                    <td>'.$results["productName"].'</td>
                    <td>'.$results["winning_bid"] .'</td>
                    </tr>
                    </table>
                    </body>
                    </html>';
                    //print_r($msg);
                $headers =  'MIME-Version: 1.0' . "\r\n"; 
                $headers .= 'From: <webmaster@OnlineAuction.com>' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n"; 
                mail($to,$subject,$msg,$headers);
            }
        }
}

?>