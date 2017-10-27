<?php
?>
<div class="jumbotron"><h1>Customer Information</h1></div>
<?php if(!empty($errors)):?>
  <div class="well"><h2 class="text-warning text-center">Please enter the required information</h2>
    <ul class="list-unstyled">
    <?php foreach($errors as $error): ?>
      <li class="list-group-item-danger"><?=$error?></li>
    <?php endforeach ?>
    </ul>
  <?php endif?>
</div>
<form class="form-horizontal col-sm-offset-2" action="index.php?action=create" method="post"> 
    <div class="form-group">
      <label class="control-label col-sm-4" for="firstName">First Name:</label>
      <div class="col-sm-5">
        <input type="text" name="firstName" class="form-control
        <?php if(isset($_POST['firstName']) && empty($firstName)) echo "error"?>" id="firstName" value="<?=$firstName?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="lastName">Last Name:</label>
      <div class="col-sm-5"> 
        <input type="text" class="form-control
        <?php if(isset($_POST['lastName']) && empty($lastName)) echo "error"?>" id="lastName" name="lastName" value="<?=$lastName?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="email">Email:</label>
      <div class="col-sm-5"> 
        <input type="email" class="form-control
        <?php if(isset($_POST['email']) && empty($email)) echo "error"?>" id="email" name="email" value="<?=$email?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="address">Street Address:</label>
      <div class="col-sm-5"> 
        <input type="text" class="form-control
        <?php if(isset($_POST['address']) && empty($address)) echo "error"?>" id="address" name="address" value="<?=$address?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="city">City:</label>
      <div class="col-sm-5"> 
        <input type="text" class="form-control
        <?php if(isset($_POST['city']) && empty($city)) echo "error"?>" id="city" name="city" value="<?=$city?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="state">State:</label>
      <div class="col-sm-5"> 
        <input type="text" class="form-control
        <?php if(isset($_POST['state']) && empty($state)) echo "error"?>" id="state" name="state" value="<?=$state?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="zip">Zip:</label>
      <div class="col-sm-5"> 
        <input type="text" class="form-control
        <?php if(isset($_POST['zip']) && empty($zip)) echo "error"?>" id="zip" name="zip" value="<?=$zip?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="phone">Phone:</label>
      <div class="col-sm-5"> 
        <input type="text" class="form-control
        <?php if(isset($_POST['phone']) && empty($phone)) echo "error"?>" id="phone" name="phone" value="<?=$phone?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="userName">User Name:</label>
      <div class="col-sm-5"> 
        <input type="text" class="form-control
        <?php if(isset($_POST['userName']) && empty($userName)) echo "error"?>" id="userName" name="userName" value="<?=$userName?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="password">Select A Password:</label>
      <div class="col-sm-5"> 
        <input type="password" class="form-control
        <?php if(isset($_POST['password']) && empty($password)) echo "error"?>" id="password" name="password" min="7">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="password2">Re-enter Password:</label>
      <div class="col-sm-5"> 
        <input type="password" class="form-control
        <?php if(isset($_POST['password2']) && empty($password2)) echo "error"?>" id="password2" name="password2" min="7">
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-5">
        <button type="submit" class="btn btn-primary" name="customerForm">Submit</button>
      </div>
    </div>
  </form>
