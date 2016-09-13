<?php require_once 'common/nav_bar.php';
require_once '../util/scriptUtil.php';
require_once '../util/dbaccessUtil.php';?>

<body>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
        <title>DELETE</title>
  </head>

    <form class="form-horizontal" action="<?php echo DELETE_RESULT ?>" method="POST">
    <fieldset class="text-center">

<?php

    //$id = $_GET['id'];
    $result = mydata(1); //GETで取得した値を入れる

    if(is_array($result)){
      if(count($result) > 0){
        $data = $result[0];
      }else{
        echo "ダメだよ！";
        die;
       }
     }
?>
      <!-- Form Name -->
      <legend>Delete Your Account</legend>

      <!-- username-->
      <div class="form-group text-center">
      <label class="col-lg-5 control-label">Name:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $data['name'] ?></p>
        </div>
      </div>

      <!-- mailaddress -->
      <div class="form-group">
      <label class="col-lg-5 control-label">Mail:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $data['mail'] ?></p>
        </div>
      </div>

      <!-- address-->
      <div class="form-group">
      <label class="col-lg-5 control-label">Address:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $data['address'] ?></p>
        </div>
      </div>

      <!-- Total price-->
      <div class="form-group">
      <label class="col-lg-5 control-label">Total Price:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $data['address'] ?></p>
        </div>
      </div>

      <!-- Registed date-->
      <div class="form-group">
      <label class="col-lg-5 control-label">Recode Date:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $data['newDate'] ?></p>
        </div>
      </div>
    <br>
      <!-- Button -->
          <input type="submit" value="Delete" class="btn btn-primary">
          <input type="hidden" name="mode"  value="COMPLETE">

  </form>

  <form action="<?php echo MY_DATA ?>" method="POST">
      <input type="submit" value="Back" class="btn btn-link">
  </form>

</fieldset>
</body>
</html>
