<?php  ?>
<div class="jumbotron"><h1>Add to cart</h1></div>
<h2>Add item to cart?</h2></br>
<?php if(isset($_POST['cart'])):?>
    <div class="well"><h3>Item: <?=getArray($_POST['sefer'])['sefer_name']?></br><!-- get index
        'sefer_name' from function getArray -->
        Price: <?=getArray($_POST['sefer'])['price']?></h3></div></br>
    <?php elseif(isset($_GET['cart'])):?>
        <div class="well"><h3>Item: <?=$_GET['sefer_name']?></br>
        Price: <?=$_GET['price']?></h3></div></br>
    <?php endif?>
    <form method="post" action="index.php?action=cart">
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="1">
        <button type="submit" class="btn btn-primary btn-sm">Add</button>
    </form>
    