<?php
if (session_id() == "")session_start();
if(!isset($_SESSION['customer'])){ //if not loged in
    header("Location:index.php?action=login");
}
?>
<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title text-danger">Error</h3>
            </div>
            <div class="modal-body">
            <ul id="formErrorMsg"></ul>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron text-center"><h1>Sell Online Form</h1></div>
<div class="form col-sm-10 text-center">
<form class="form-horizontal" id="sell-form" method="post" enctype="multipart/form-data">
    <div class="form-group text-left">
        <label class="form-label" for="productName">What product do you want to sell?</label>
        <input type="text" class="form-control" id="productName" name="productName" required>
    </div>
    <div class="form-group text-left">
        <label for="title">What title do you want to display?</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group text-left">
        <label for="items_pic">Coose 4 images (.jpg, .jpeg, .png, .pjpeg) to display</label>
        <input type="file" id="items_pic" name="items_pic[]" accept=".jpg, .jpeg, .png" multiple>
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
        <label for="days">Enter how many days should the product be up for auction (enter amount between 1 and 10 days)</label>
        <input type="number" step="1" min="1" max="10" class="form-control subImg" id="days" name="days" required>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
</form>


