<?php require_once 'common/nav_bar.php';
      require_once '../util/dbaccessUtil.php';
      require_once '../util/scriptUtil.php';

      $ses_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Stranger" ;
      //UPDATE
      $log_content = $ses_name. " UPDATED";
        writeLog("UPDATE", $log_content);

?>



<body>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
        <title>Confirm</title>
  </head>

  <form class="form-horizontal">
  <fieldset class="text-center">

<?php
if(!isset($_POST['mode'])){
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{

    $name = $_SESSION['name'];
    $password = $_SESSION['password'];
    $mail = $_SESSION['mail'];
    $address = $_SESSION['address'];

    //データのDB挿入処理。エラーの場合のみエラー文がセットされる。成功すればnull
    $result = update_profile(1, $name, $password, $mail, $address);

    //エラーが発生しなければ表示を行う
    if(!isset($result)){
?>

      <!-- Form Name -->
      <legend>You have successfully updated!</legend>

      <!-- username-->
      <div class="form-group">
      <label class="col-lg-5 control-label">Name:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $name ?></p>
        </div>
      </div>


      <!-- Password -->
      <div class="form-group">
        <label class="col-lg-5 control-label">Password:</label>
          <div class="col-md-2">
            <p class="form-control-static" type="password"><?php echo $password ?></p>
          </div>
        </div>

            <!-- mailaddress-->
            <div class="form-group">
            <label class="col-lg-5 control-label">Mail:</label>
              <div class="col-md-2">
                <p class="form-control-static" type="text"><?php echo $mail ?></p>
              </div>
            </div>


            <!-- address-->
            <div class="form-group">
            <label class="col-lg-5 control-label">Address:</label>
              <div class="col-md-2">
                <p class="form-control-static" type="text"><?php echo $address ?></p>
              </div>
            </div>
          <br>
      <?php
          unset($_SESSION['name']);
          unset($_SESSION['password']);
          unset($_SESSION['address']);
          unset($_SESSION['mail']);

      }else{
          echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
      }
?>

  </form>


<?php } ?>

</fieldset>
</body>
</html>
