<?php require_once 'common/nav_bar.php';?>

<html>
<body>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
        <title>added to cart</title>
  </head>

    <fieldset class="text-center">

<?php

  //Add to cart
  if (isset ( $_POST ['add_to_cart'] )) {

    $item_code = $_POST['add_to_cart'];
    $hit = getItemByCode($item_code);

    // get list from cookie
    if(isset($_COOKIE ['list_code'])){
      $list_code = unserialize ( $_COOKIE ['list_code'] );
    }else{
      $list_code = Array();
    }
  	// add new code in list, check if this code is exist
  	if (! in_array ( $item_code, $list_code )) {
  		$list_code [] = $item_code;
  	}
  	// add new list in cookie
  	setcookie ( 'list_code', serialize ( $list_code ), time () + 3600 ); /* expire in 1 hour */
  }

?>


<!-- Form Name -->
<legend>You have successfully added to cart!</legend>
<p class="text-info"><?php echo $hit->Name ?> </p>
<img src="<?php echo $hit->Image->Medium;?>">
<br>
<br>
      <div class="text-center">
        <a href="<?php echo getSearchUrl();  ?>" class="btn btn-default">
            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
        </a>
      </div>

</fieldset>
</body>
<html>
