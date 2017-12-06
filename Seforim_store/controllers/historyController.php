<?php
include_once 'db.php';
$db = new db();
$con = $db->createDb();
if (session_id() == "")session_start();
$id = $_SESSION['customer']['id'];
$title = "History";
include 'models/historyModel.php';
include 'views/top.php';
include 'views/historyView.php';
include 'views/bottom.php';
?> 