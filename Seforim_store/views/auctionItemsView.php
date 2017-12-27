
<div class="container">
<div class="jumbotron text-center"><h1>Auction Items</h1></div>
    <div class="text-left">
        <a href="index.php?action=sell" class="text-success">Have a Sefer to sell?</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th class="text-center">Product Name</th>
                <th class="text-center">Current Price</th>
                <th class="text-center">Image</th>
            </thead>
            <tbody id="item-link">
                <?php foreach ($items as $item) : ?>
                    <tr><td><button class="btn btn-link" id=<?=$item['id'] ?>>
                        <?=$item['productName']?></button></td>
                    <td>$20.99</td>
                    <td><img src=<?=$item['mainImage']?> class="thumbnail" 
                        id="table-img"></td></tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>