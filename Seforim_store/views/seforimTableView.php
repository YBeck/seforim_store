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
    include 'top.php';
?>
<div class="jumbotron"><h1 class="h1">Seforim Store</h1></div>
<div class="row">
    <?php include_once 'views/sortView.php'; ?>
</div>
<div class="row">
    <?php include 'filterView.php' ?>
    <div class="col-sm-8 text-left">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
            <tbody>
                <?php foreach(getRows() as $seforim): ?>
                    <tr>
                        <td><a href="<?=getLink(['action'=>'selected', 'id'=>$seforim['id']])?>"><?= $seforim['sefer_name'] ?></a></td>
                        <td><?= $seforim['id'] ?></td>
                        <td>$<?= number_format($seforim['price'], 2) ?></td>
                        <td><?= $seforim['cat_name'] ?></td>
                        <?php if(isset($_SESSION['customer']) && $_SESSION['customer']['admin'] == 1):?> 
                            <td><a href="<?=getLink(array_merge (['action'=>'update', 'currentPage'=>'table', 'update'=>""], $seforim))?>" class="btn btn-primary">Update</a></td>
                            <td><a href="<?=getLink(array_merge (['action'=>'delete', 'currentPage'=>'table', 'delete'=>""], $seforim))?>" class="btn btn-danger">Delete</a></td>
                        <?php endif?>
                        <td><a href="<?=getLink(array_merge (['action'=>'cart', 'currentPage'=>'table', 'cart'=>""], $seforim))?>" class="btn btn-primary">Add To Cart</a></td>
                    </tr>
                </tbody>
                <?php endforeach ?>
            </thead>
        </table>
    </div>
    </div>
     <div>
        <a href="<?=getLink(['page' => $page -1])?>"class="btn btn-link previous"
        <?php if($page <1) echo "disabled"?>>Previous</a>
        <a href="<?=getLink(['page' => $page +1])?>"class="btn btn-link next">Next</a> 
    </div> 
</div>
<?php include 'bottom.php'; ?>