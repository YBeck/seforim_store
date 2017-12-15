<?php
    
?>

<div class="jumbotron text-center"><h1>Online Auction</h1></div>
<div class="row">
    <div class="col-sm-4" id="main-img-div">
        <img src="" class="img-responsive" id="main-img"> 
    </div><!-- end of main img col -->
    <div class="col-sm-8">
        <h3 class="text-left" id="product-title"></h3>
        <hr/>
        <div class="row">
            <div class="col-sm-7">
                <p>Item condition: <span id="item-condition"></span></p>
                <p>Time left: 5:43</p>
                <section class="well-lg" id="bid-info">
                    <p class="text-left">Current bid: <strong id="current-bid">$22.50</strong>
                    <span id="bid-span">There are currently <span id="bid-amouny">5</span> bids</span></p>
                    <form action="" class="form-inline">
                        <input type="number" step="any" id="bid-entered">
                        <button type="button" class="btn btn-primary btn-xs">Place bid</button>
                    </form>
                    <p>Enter an amount of <span id="place-amount">$21.00</span> or more</p>
                </section>
                <div class="row" id="thumb-div">
                    <div class="col-sm-4">
                        <img src="" class="img-thumbnail" id="first-thumbnail">
                    </div> <!-- end of first thumb img col -->
                    <div class="col-sm-4">
                        <img src="" class="img-thumbnail" id="second-thumbnail">
                    </div> <!-- end of second thumb img col -->
                    <div class="col-sm-4">
                        <img src="" class="img-thumbnail" id="third-thumbnail">
                    </div> <!-- end of third thumb img col -->
                </div><!-- end of thumbnail row -->
            </div><!-- end of inner left col -->
            <div class="col-sm-5">
                <section>
                    <h4>Product details</h4>
                    <p id="product-description" class="text-left text-success"></p>
                </section>
                <section id="seller-info" class="well-lg">
                    <h4>Seller information</h4>
                    <p>User name: <span  id="seller-name"></span></p>
                    <p>Email: <span id="seller-email"></span></p>
                </section>
            </div><!-- end of inner right col -->
        </div><!-- end of inner row -->
    </div><!-- end of title col -->
</div><!-- end of outer row -->
