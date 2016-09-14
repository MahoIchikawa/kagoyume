<?php require_once 'common/nav_bar.php';

  if(!isset($_SESSION['id'])){
    echo "<h2 class='text-center text-danger'>Please login before buying!</h2>";
    die;
  }
$user_id = $_SESSION['id'];

if(!isset($_POST['item_codes']) || !isset($_POST['shipping_type'])){
  echo "<h1 class='text-center text-danger'>Error 404!</h1>";
  die;
}
$item_codes = $_POST['item_codes'];
$shipping_type = $_POST['shipping_type'];


//insert into database
foreach ($item_codes as $item_code) {
  insert_item($user_id, $item_code, $shipping_type);
}
//delete cart cookie
setcookie('list_code', '', time()-1000);
setcookie('list_code', '', time()-1000, '/');
?>

<html>
<body>
<h1 class="text-center text-success">Thanks for shopping!</h1>
</body>
<html>
