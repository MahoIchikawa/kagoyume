<?php require_once 'common/nav_bar.php';
require_once '../util/scriptUtil.php'; ?>

<body>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
        <title>Confirm</title>
  </head>

  <form class="form-horizontal" action="<?php echo UPDATE_RESULT ?>" method="POST">
  <fieldset class="text-center">

<?php
if(!isset($_POST['mode']) || $_POST['mode'] != "CONFIRM"){
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{
  //セッションスタート
    session_start();

    //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
    $confirm_values = array(
                            'name' => bind_p2s('name'),
                            'password' => bind_p2s('password'),
                            'mail' =>bind_p2s('mail'),
                            'address' =>bind_p2s('address'));

    if(!in_array(null,$confirm_values, true)){?>
      <!-- Form Name -->
      <legend>Confirm New Your Account</legend>

      <!-- username-->
      <div class="form-group">
      <label class="col-lg-5 control-label">Name:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $confirm_values['name'] ?></p>
        </div>
      </div>

      <!-- Password -->
      <div class="form-group">
      <label class="col-lg-5 control-label">Password:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="password"><?php echo $confirm_values['password'] ?></p>
        </div>
      </div>

      <!-- mailaddress-->
      <div class="form-group">
      <label class="col-lg-5 control-label">Mail:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $confirm_values['mail'] ?></p>
        </div>
      </div>

      <!-- address-->
      <div class="form-group">
      <label class="col-lg-5 control-label">Address:</label>
        <div class="col-md-2">
          <p class="form-control-static" type="text"><?php echo $confirm_values['address'] ?></p>
        </div>
      </div>
    <br>
      <!-- Button -->
          <input type="submit" value="Save" class="btn btn-primary">
          <input type="hidden" name="mode"  value="COMPLETE">
      </form>

  <?php  }else{ ?>

    <h2><div><font color="red">!!CAUTION!!</font></div></h2><br>
    再度入力を行ってください<br>
    <h3>不完全な項目</h3>
    <?php
    //連想配列内の未入力項目を検出して表示
    foreach ($confirm_values as $key => $value){
        if($value == null){
            if($key == 'name'){
                echo '名前';
            }
            if($key == 'password'){
                echo 'パスワード';
            }
            if($key == 'mail'){
                echo 'メールアドレス';
            }
            if($key == 'address'){
                echo '住所';
            }
            echo 'が未入力です<br>';
        }
    }?>
  </form>
<?php
  }?>

  <form action="<?php echo MY_DATA ?>" method="POST">
      <input type="submit" value="Back" class="btn btn-link">
  </form>

<?php }?>

</fieldset>
</body>
</html>
