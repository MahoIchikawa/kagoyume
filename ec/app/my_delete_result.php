<?php require_once 'common/nav_bar.php';

$ses_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Stranger" ;
//DELETE
$log_content = $ses_name. " DELETED";
  writeLog("DELETE", $log_content);
?>

<body>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
        <title>DELETE</title>
  </head>

    <form class="form-horizontal">
    <fieldset class="text-center">

<?php

    $id = $_SESSION['id'];
    $result = delete_profile($id); //GETで取得した値を入れる

    if(!isset($result)){
    ?>
    <!-- Form Name -->
    <legend>DELETE</legend>

    <!-- username-->
    <div class="form-group text-center">
    <label class="col-lg-7 control-label">Account successfully deleted</label>
    </div>

    <?php
    }else{
        echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }

?>

    <br>

  </form>

</fieldset>
</body>
</html>
