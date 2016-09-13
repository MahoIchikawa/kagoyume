<?php
    require_once '../util/defineUtil.php';
    require_once '../util/dbaccessUtil.php';
    require_once 'common/nav_bar.php';

     session_unset();
     session_destroy();
     header("location:top.php");  // メイン画面へ遷移
     exit();
  ?>
