<div class="jumbotron"><h1 class="text-center">Login</h1></div>
<?php if(!empty($error)):?>
    <div class="well"><h3 class="text-warning">Please correct the following information</h3></div>
    <ul class="list-unstyled">
        <li class="list-group-item-danger"><?=$error?></li>
    </ul>
<?php endif?>
<form class="form-inline text-center" action="index.php?action=login" method="post">
    <div class="form-group">
        <label for="loginName">User Name:</label>
        <input type="text" class="form-control"  id="loginName" name="loginName" value="<?=$loginName?>">
    </div>
    <div class="form-group">
        <label for="loginPassword">Password:</label>
        <input type="password" class="form-control" id="loginPassword" name="loginPassword">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button> 
</form>
<div>
    <p>Not a member? click <a href="index.php?action=create">here</a></p>
</div>