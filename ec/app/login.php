<?php
    require_once '../util/defineUtil.php';
    require_once '../util/dbaccessUtil.php';
    require_once 'common/nav_bar.php';

          //エラーメッセージの初期化
          $errorMessage = array();
          $failedMessage = null;

          if (!empty($_POST["login"])) {

              $result = null;
             if (isset($_POST["username"]) && $_POST["password"]) {
               $name = $_POST["username"];
               $pass = $_POST["password"];
               $result = login($name, $pass);
               }

              if(count($result) <= 0){
                  $failedMessage= 'ユーザー名あるいはパスワードに誤りがあります。';
              }else{
               $_SESSION['username'] = $name;
               header("location:top.php");  // メイン画面へ遷移
               exit();
              }
          }
  ?>

  <!DOCTYPE html>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
        <title>LOGIN</title>
  </head>
  <body>
        <form class="form-horizontal" action="" method="POST">
        <fieldset class="text-center">

        <!-- Form Name -->
        <legend>LOGIN PAGE</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput"></label>
          <div class="col-md-4">
          <input id="textinput" name="username" type="text" placeholder="Your username" class="form-control input-md">
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="passwordinput"></label>
          <div class="col-md-4">
            <input id="passwordinput" name="password" type="password" placeholder="Your password" class="form-control input-md">
          </div>
        </div>
        <?php
        foreach($errorMessage as $message){ ?>
            <div><font color="red"><?php echo $message ?></font></div> <?php };?>
            <div><font color="red"><?php echo $failedMessage ?></font></div>


        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12 text-center">
            <input type="submit" id="login" name="login" class="btn btn-primary" value="Login">
            <br>
            <a href="<?php echo REGIST; ?>">Create new account</a><br>
            <form type="hidden" name="mode" action="common/nav_bar.php" value="IN" method="POST"></form>
          </div>
        </div>
        </fieldset>
        </form>


</body>
</html>
