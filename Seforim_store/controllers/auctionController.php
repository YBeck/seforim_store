<?php
    $title = 'Online auction';
    $styles = '#bid-info{background: rgb(191,191,191);
        margin-bottom: 10px;}
        #bid-span{margin-left: 70px;}
        #main-img-div{height: 385px;
        padding-top: 25px;}
        #main-img{height: 100%;}
        #seller-info{border: 1px solid blueviolet;
        background: aliceblue;}
        .img-thumbnail{height: 97px !important; width: 130px !important;}
        #myModal{display:none;}';
        
    include 'views/top.php';
    include 'views/auctionView.php';
    include 'views/bottom.php';
?>