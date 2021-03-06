<?php
include 'utils/adminOnly.php';
include 'top.php';
?>

<body> 
    <div class="jumbotron text-center"><h1 class="h1">Add Seforim</h1></div>
    <form class="form-inline text-center" method="post">
        <?php if(isset($errors)): ?>
        <div class="alert alert-danger col-sm-offset-4">
            <ul>
            <?php foreach ($errors as $error) { ?>
                <li> <?= $error ?> </li>
            <?php } ?>
            </ul>
        </div> 
    <?php else: ?>
        <div class="form-group">
            <label for="sefer">Sefer Name:</label>
            <input type="text" class="form-control" id="sefer" name="seferEntered">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="any" class="form-control" id="price" name="priceEntered">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity">
        </div>
        <select class="form-control" id="sefer" name="categoryEntered"  required> 
        <?php foreach($checkbox as $check): ?>
        <option value="<?=$check['id']?>">
            <?= $check['name']?>
        </option>
        <?php endforeach ?>
                        </select>
    <button type="submit" class="btn btn-primary">Add Sefer</button>
    </form>
    <?php endif ?>
    </div>
    <?php
    include 'bottom.php';
    ?>