<?php if (!empty($results)):?>
    <h2 class="text-capitalize"><?=$results[0]['first_name'] . "'s Order History"?></h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>name</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($results as $result):?>
            <tr>
                <td class="text-left"><?=$result['name']?></td>
                <td class="text-left"><?=date('F/j/Y', $result['date'])?></td>
            </tr>
        <?php endforeach?>
        </tbody> 
    </table>
<?php else:?>
<h2 class="text-center">You have no history</h2>
<?php endif?>