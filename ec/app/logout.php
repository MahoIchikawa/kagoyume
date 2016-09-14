<?php
    require_once 'common/nav_bar.php';

//unset session
     session_unset();
     session_destroy();

  // unset cookies
  if (isset($_SERVER['HTTP_COOKIE'])) {
  $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
  foreach($cookies as $cookie) {
      $parts = explode('=', $cookie);
      $name = trim($parts[0]);
      setcookie($name, '', time()-1000);
      setcookie($name, '', time()-1000, '/');
    }
  }

     header("location:top.php");  // メイン画面へ遷移
     exit();
  ?>
