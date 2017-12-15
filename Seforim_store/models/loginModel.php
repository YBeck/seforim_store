<?php 

if(isset($_GET['logout'])){
        unset($_SESSION['customer']);
    }else{
        $query = "SELECT c.id, c.first_name, c.last_name, up.user_name,
        c.email, up.password, up.admin
        FROM customers c
        JOIN userPassword up ON up.cust_id = c.id WHERE up.user_name = :name";
        //$query = "SELECT id, first_name, last_name, user_name, password, admin FROM customers WHERE user_name = :name";

            $statement = $con->prepare($query);
            $statement-> bindvalue('name', $loginName);
            $statement-> execute();
            $values = $statement->fetch(PDO::FETCH_ASSOC);

            if(empty($values)){
                $error = "The user name you entered does not match our records";
            }else if(!password_verify($loginPassword, $values['password'])){
                    $error = "The password you entered does not match our records";
            }

            if(empty($error)){
                session_start();
                $_SESSION['customer'] = ['id' => $values['id'], 'f_name' => $values['first_name'], 
                    'l_name' => $values['last_name'], 'user_name' => $values['user_name'],
                    'email' => $values['email'], 'admin' => $values['admin']];
                header("Location:index.php?action=home");
            }else{
                include 'controllers/loginController.php';
            }
        }
  
?>
