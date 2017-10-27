<?php

?>

<div class="container">
<div class="jumbotron text-center"><h1 class="h1">View Cart</h1></div>
<ul class="list-group">
    <li class="list-group-item active"><h3 class="inline">Cart</h3>
        <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])):?>
            <a href="index.php?action=update&checkout=yes" class="btn btn-default col-sm-offset-10">Checkout</a>
        <?php endif ?>
    </li>
    <?php if(!empty($_SESSION['cart'])) : ?>
        <?php foreach ($theCart as $getCart) : ?>
            <li class="list-group-item list-group-item-info text-left">Item: <?=$getCart['name']?> Quantity: <?=$getCart['quantity']?>
            <?php if(!empty($editName) && $editName === $getCart['name']):?>
                <form class="form-inline text-center clear" method="post" action=index.php?action=cart>
                    <div class="form-group row">
                    <div class="">
                        <label for="input" class="col-sm-3 control-label">Quantity</label>
                        <input type="number" class="form-control" id="input" name="editAmount">
                    </div>
                    </div>
                    <input type="hidden" name="editItem" value="<?=$getCart['name']?>">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>
                    <?php endif?>
                <div class="row col-sm-offset-10">       
                <a href="index.php?action=cart&editName=<?=$getCart['name']?>&editQuantity=<?=$getCart['quantity']?>&viewCart=yes"class="btn btn-primary btn-sm">Edit</a>
                <a href="index.php?action=cart&remove=<?=$getCart['name']?>"class="btn btn-warning btn-sm">Remove</a>
            </div>
            </li>
            <?php endforeach ;
        else:?>
        <li class="list-group-item"><h2>You have no items in your cart<h2></li>
        <?php endif ?>
</ul>
<a href="index.php">Home</a>