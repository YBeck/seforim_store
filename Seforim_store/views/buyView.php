<?php
include_once 'top.php';
?>
<div class="jumbotron"><h1 class="h1 text-center">Seforim Order</h1></div>
<h2 class="h2 text-center">Your order</h2>
<table class="table table-hover text-info text-left">
    <thead>
        <th>Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
    </thead>
     <tbody>
        <?php foreach($_SESSION['cart'] as $buy) :;?>
            <tr>
                <td><?=$buy['name']?></td>
                <td><?=$buy['quantity']?></td>
                <td>$<?=number_format($cart->getItemPrice($buy['name']), 2)?></td>
                <td>$<?=number_format($cart->getTotalItemPrice($buy['name']), 2)?></td>
            </tr>
        <?php endforeach?>
    </tbody>
    <tfoot>
        <tr class="info text-primary">
            <th colspan="3" class="text-right">Total:</th>
            <th>$<?=number_format($cart->getTotalCartPrice(), 2)?></th>
        </tr>  
    </tfoot>
</table>
<h4 class="h4 text-center text-success">Thank you for your purchase!</h4>
<?php unset($_SESSION['cart']);?>
<a href="<?=getLink(['action' => $cartArray['currentPage']])?>" class="btn btn-success">OK</a> 
<?php include_once 'bottom.php';?>