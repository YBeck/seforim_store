<?php

$offset = 0;
$page = 0;

if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page < 0){
        $page = 0;
    }
    $offset = $page * 4;
}
?>