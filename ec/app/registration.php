<?php require_once 'common/nav_bar.php'; ?>
<html>
<body>

  <form class="form-horizontal" action="<?php echo REGIST_CONF ?>" method="POST">
  <fieldset class="text-center">

  <!-- Form Name -->
  <legend>Create New Your Account Page</legend>

  <!-- username-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput"></label>
    <div class="col-md-4">
    <input name="name" type="text" placeholder="UserName" class="form-control input-md">
    </div>
  </div>

  <!-- Password -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="passwordinput"></label>
    <div class="col-md-4">
      <input name="password" type="password" placeholder="Password" class="form-control input-md">
    </div>
  </div>

  <!-- mailaddress-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput"></label>
    <div class="col-md-4">
    <input name="mail" type="text" placeholder="Mail" class="form-control input-md">
    </div>
  </div>

  <!-- address-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput"></label>
    <div class="col-md-4">
    <input name="address" type="text" placeholder="Address" class="form-control input-md">
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <div class="col-md-12 text-center">
    <label class="col-md-4 control-label" for="singlebutton"></label>
    <div class="col-md-4">
      <button name="singup" class="btn btn-primary">SignUp</button>
      <input type="hidden" name="mode"  value="CONFIRM">
    </div>
    </div>
  </div>

  </fieldset>
  </form>

</body>
<html>
