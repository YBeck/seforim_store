<?php
class Cart{
    private static $instance;
    
    private function __construct(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
    }

    public static function getInstance(){
        if(empty(Cart::$instance)){
            Cart::$instance = new Cart();
        }
        return Cart::$instance;
    }

    function addItem($itemId, $itemName, int $quantity, $price){
        if(is_numeric($quantity) && $quantity > 0){
            if(isset($_SESSION['cart'][$itemName]['quantity'])){
                $quantity += $_SESSION['cart'][$itemName]['quantity'];
            }
            $_SESSION['cart'][$itemName] = ['id' => $itemId, 'name' => $itemName, 
                'quantity' => $quantity, 'price' => $price];
        }
    }

    function getCart(){
        return $_SESSION['cart'];
    }

    function emptyCart(){
        unset($_SESSION['cart']);
    }

    function removeItem($itemName){
        unset($_SESSION['cart'][$itemName]);
    }

    function editCart($itemName, $quantity){
        $_SESSION['cart'][$itemName]['quantity'] = $quantity;
    }

    function getTotalCartPrice(){
        $price = 0;
        foreach($_SESSION['cart'] as $cart){
            for($i=0; $i < $cart['quantity']; $i++){
                $price += $cart['price'];
            }
        }
        return $price;
    }

    function getItemPrice($itemName){
        return $_SESSION['cart'][$itemName]['price'];
    }

    function getTotalItemPrice($itemName){
        $price = 0;
        $quantity = $_SESSION['cart'][$itemName]['quantity'];
        for($i=0; $i < $quantity; $i++){
            $price += $_SESSION['cart'][$itemName]['price'];
        }
        return $price;
    }
}
?>