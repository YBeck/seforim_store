
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
            <tbody id="table">
                <?php foreach ($items as $item) : ?>
                    <tr><td><button class="btn btn-link" id=<?=$item['id'] ?>>
                        <?=$item['productName']?></button></td>
                    <td><?=$item['cur_bid']?></td>
                    <td><img src=<?=$item['mainImage']?> class="thumbnail" 
                        id="table-img"></td></tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div id="pager">
        <button class="btn btn-primary" id="previous">Previous page</button>
        <button class="btn btn-primary" id="next">Next page</button>
    </div>
</div>