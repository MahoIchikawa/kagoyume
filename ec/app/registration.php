<?php require_once 'common/nav_bar.php'; ?>
<html>
<body>

  <form class="form-horizontal" action="<?php echo REGIST_CONF ?>" method="POST">
  <fieldset class="text-center">

  <!-- Form Name -->
  <legend>Create New Your Account Page</legend>

  <?php
  $name = isset($_SESSION['name']) ? $_SESSION['name'] : null ;
  $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : null ;
  $address = isset($_SESSION['address']) ? $_SESSION['address'] : null ;

  ?>

  <!-- username-->
  <div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
    <input type="text" name="name" <?php if(isset($name)){?> value= "<?php echo $name;?>" <?php }else{
      ?> placeholder="UserName" <?php }?> class="form-control input-md">
    </div>
  </div>

  <!-- Password -->
  <div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
    <input type="password" name="password" placeholder="Password" class="form-control input-md">
    </div>
  </div>

  <!-- mailaddress-->
  <div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
    <input type="text" name="mail" <?php if(isset($mail)){?> value= "<?php echo $mail;?>" <?php }else{
      ?> placeholder="Mail" <?php }?> class="form-control input-md">
    </div>
  </div>

  <!-- address-->
  <div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
    <input type="text" name="address" <?php if(isset($address)){?> value= "<?php echo $address;?>" <?php }else{
      ?> placeholder="Address" <?php }?> class="form-control input-md">
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <div class="col-md-12 text-center">
    <label class="col-md-4 control-label" for="singlebutton"></label>
    <div class="col-md-4">
      <button name="singup" class="btn btn-primary">SignUp</button>
      <input type="hidden" name="mode" value="CONFIRM">
    </div>
    </div>
  </div>

  </fieldset>
  </form>

</body>
<html>
