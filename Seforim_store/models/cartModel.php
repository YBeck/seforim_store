<?php
 $cart = Cart::getInstance();
if(isset($_POST['quantity'])){
    $cart->addItem($itemId, $itemName, $amount, $price);
}

if(!empty($newAmount) && !empty($item)){
    $cart->editCart($item, $newAmount);
}

if(!empty($remove)){
    $cart->removeItem($remove);
}

if(isset($_GET['viewCart']) || isset($_POST['editItem']) || isset($_GET['remove'])){
    $theCart = $cart->getCart();
}
?>