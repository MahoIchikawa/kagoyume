<?php require_once 'blank.php';
session_start();
?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo TOP;?>">
        <span class="glyphicon glyphicon-home"></span>
      </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      <li><a href="<?php echo CART;?>"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
      </ul>

      <?php
      if(isset($_SESSION['username'])){?>
        <ul class="nav navbar-nav navbar-right">
         <li><a href="<?php echo MY_DATA;?>" style="color:white;"><span class="glyphicon glyphicon-user"></span> Hello, <?php echo $_SESSION['username']?></a></li>
         <li><a href="<?php echo LOG_OUT;?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    <?php }else{?>
        <ul class="nav navbar-nav navbar-right">
         <li class="text-left"><a href="#" style="color:white;">まだログインしていない</a></li>
         <li><a href="<?php echo REGIST;?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
         <li><a href="<?php echo LOGIN;?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
<?php    } ?>
    </div><!--/.nav-collapse -->
  </div>
</div>
