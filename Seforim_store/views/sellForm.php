<?php
if (session_id() == "")session_start();
if(!isset($_SESSION['customer'])){ //if not loged in
    header("Location:index.php?action=login");
}
?>

<div class="jumbotron text-center"><h1>Sell Online Form</h1></div>
<div class="form col-sm-10 text-center">
<form class="form-horizontal" id="sell-form" method="post">
    <div class="form-group text-left">
        <label class="form-label" for="productName">What product do you want to sell?</label>
        <input type="text" class="form-control" id="productName" name="productName" required>
    </div>
    <div class="form-group text-left">
        <label for="title">What title do you want to display?</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group text-left">
        <label for="mainImg">Enter a URLfor the main image you want to display</label>
        <input type="text" class="form-control" id="mainImg" name="mainImg" required>
    </div>

    <div class="form-group text-left">
        <label for="subImg">Enter 3 URL's for the sub images you want to display</label>
        <input type="text" class="form-control subImg" id="subImg1" name="subImg1" required>
    </div>
    <div class="form-group text-left">
        <input type="text" class="form-control subImg" id="subImg2" name="subImg2" required>
    </div>
    <div class="form-group text-left">
        <input type="text" class="form-control subImg" id="subImg3" name="subImg3" required>
    </div>
    <div class="text-left form-group"> 
        <span><strong>Is this item new or used?</strong></span> 
        <label class="radio-inline text-left"><input type="radio" name="condition" id="new" value="new">New</label>
        <label class="radio-inline" ><input type="radio" name="condition" id="used" value="used">Used</label>
    </div> 
    <div class="form-group text-left">
        <label for="description">Enter a description of the product</label>
        <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
    </div> 
    <div class="form-group text-left">
        <label for="startPrice">Enter the start biding price</label>
        <input type="number" step="any" class="form-control subImg" id="startPrice" name="startPrice" required>
    </div>
    <div class="form-group text-left">
        <label for="days">Enter how many days should the product be up for auction</label>
        <input type="number" step="1" class="form-control subImg" id="days" name="days" required>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
</form>


