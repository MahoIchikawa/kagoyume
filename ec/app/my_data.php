<?php require_once 'common/nav_bar.php';
      require_once '../util/dbaccessUtil.php';

      $ses_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Stranger" ;
        //MYDATAログ
        $log_content = $ses_name. " move to Mydata ";
        writeLog("MYDATA", $log_content);?>



<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-2">
        <div class="text-center">

        </div>
      </div>

    <?php

    $id =  $_SESSION['id'];
    $result = mydata($id); //$idでゲットする

      if(is_array($result)){
        if(count($result) > 0){
          $data = $result[0];
        }else{
          echo "<h2 class='text-center text-danger'>Please login!</h2>";
          die;
         }
       }

       $name = isset($_SESSION['name']) ? $_SESSION['name'] : null ;
       $pass = isset($_SESSION['password']) ? $_SESSION['password'] : null ;
       $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : null ;
       $address = isset($_SESSION['address']) ? $_SESSION['address'] : null ;

       ?>


      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="fa fa-coffee"></i>
          you can edit or delete your account.
        </div>
        <h3>Personal info</h3>

        <form class="form-horizontal" action="<?php echo UPDATE ?>" method="POST">
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="name" value="<?php echo $data['name'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="mail" value="<?php echo $data['mail'] ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="address" value="<?php echo $data['address'] ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
              <input type="hidden" name="mode" value="CONFIRM">
        </form>
            <a href="<?php echo TOP ?>" class="btn btn-default"> Cancel</a><br>
            </div>
            </div>


      <?php //delete account ?>
        <div class= "text-right">
          <a href="<?php echo HISTORY; ?>"><span class="glyphicon glyphicon-time"></span> My History</a><br>
          <a href="<?php echo DELETE; ?>"><span class="glyphicon glyphicon-trash"></span>Delete MyAccount</a><br>
        </div>
      </div>
  </div>
</div>
<hr>
