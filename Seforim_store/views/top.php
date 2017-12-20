<?php include_once 'utils/link.php'; 
    $title = !empty($title) ? $title : "seforim";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">
    <title><?= $title ?></title>
    <style>
        body{
            padding-top: 70px;
            /* background-image: url("images/home.jpg");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover; */
        }
        #startPrice:parent{
            display: none;
        }

        <?php if (!empty($styles)) echo $styles ?>
    </style>
</head>
<body>
    <nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">SEFORIM</a>
    </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="<?=getLink(['action' => 'home', 'viewCart' => null, 'update' => null])?>">Home</a></li>
            <li><a href="<?=getLink(['action' => 'table', 'viewCart' => null,'update' => null])?>">Table</a></li>
            <li><a href="<?=getLink(['action' => 'auctionItems', 'viewCart' => null,'update' => null])?>">Auction</a></li>
            <?php if (session_id() == "")session_start();
            if(isset($_SESSION['customer']) && $_SESSION['customer']['admin'] == 1):?>
                <li><a href="<?=getLink(['action' => 'add'])?>">Add Sefer</a></li>
            <?php endif ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (session_id() == "")session_start();
             if(!empty($_SESSION['customer'])):?>
                <li><a href="index.php?action=history"><span class="glyphicon glyphicon-user">
                </span>Hi, <?= ucwords($_SESSION['customer']['f_name'] . " " . $_SESSION['customer']['l_name'])?></a></li>
            <?php endif ?>
            <li><a href="index.php?action=cart&viewCart=yes"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</span></a></li>
            <?php if(!isset($_SESSION['customer'])):?>
                <li><a href="index.php?action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php else:?>
                <li><a href="index.php?action=login&logout=yes"><span class="glyphicon glyphicon-log-out">Logout</span></a></li>
            <?php endif?>
            <li><a href="index.php?action=create">Create Account</a></li>
        </ul>
        </div>
    </div>
</nav>
    <div class="container text-center">
