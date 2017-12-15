<?php
    $styles = ".btn-link{
        font-size: 2em;
    }
    .next::after{
        content: \" >>>\";
    }
    .previous::before{
        content:\"<<< \";
    }
    .clear{
        clear:both;
    }";
    include_once 'top.php';
    include_once 'utils/link.php';
?>
<div class="jumbotron"><h1 class="h1">Seforim Store</h1></div>
<div class="text-left">
    <a href="index.php?action=sell">Have a Sefer to sell?</a>
</div>
    <div class="row">
        <?php include_once 'views/sortView.php'; ?>
    </div>
    <div class="row"> 
        <?php include 'filterView.php' ?>
    <div class="col-sm-8 text-right">
        <form class="form-inline" method="post">
            <?php if(isset($errors)): ?>
                <div class="alert alert-danger col-sm-offset-4">
                    <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li> <?= $error ?> </li>
                    <?php } ?>
                    </ul>
                </div> 
            <?php else:?>
                <div class="form-group">
                    <label for="sefer">Choose a Sefer</label>
                    <select class="form-control" id="sefer" name="sefer" required>
                        <option value="" disabled selected>Choose a Sefer</option>
                    <?php foreach(getRows() as $seforim):?>             
                        <option value="<?=valueString($seforim) . '|currentPage=home'?>"                       
                        <?php if($seferId === $seforim['id']) echo "selected" ?>
                        ><?= $seforim['sefer_name']?></option> 
                    <?php endforeach ?>
                    </select>
                </div> 
                <button name="info" type="submit" class="btn btn-primary">Get Sefer Info</button>
                 <?php if(isset($_SESSION['customer']) && $_SESSION['customer']['admin'] == 1):?>
                    <button name="update" type="submit" formaction="<?=getLink(['action' => 'update'])?>" class="btn btn-primary">Update</button>
                    <button name="delete" type="submit" formaction="<?=getLink(['action' => 'delete'])?>" class="btn btn-danger">Delete</button>
                <?php endif?>
                <button name="cart" type="submit" formaction="<?=getLink(['action' => 'cart'])?>" class="btn btn-primary">Add to cart</button>
                <?php if(empty($errors) && isset($_POST['info'])){ ?>
                    <h2 class="h2">The sefer is: <?= getSeforimInfo($seferId) ?></h2>
                <?php } ?> 
            </form>
        </div>
            <?php endif; ?>
            </div>
            <div>
                <a href="<?=getLink(['page' => $page -1])?>"class="btn btn-link previous"
                <?php if($page <1) echo "disabled"?>>Previous</a>
                <a href="<?=getLink(['page' => $page +1])?>"class="btn btn-link next">Next</a> 
            </div>
        </div>
        <?php
include 'bottom.php';
?>