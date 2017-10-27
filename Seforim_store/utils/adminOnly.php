<?php
if (session_id() == "")session_start();
if(!isset($_SESSION['customer']) || $_SESSION['customer']['admin'] == 0){
    header("Location:index.php?action=home");
}
?>