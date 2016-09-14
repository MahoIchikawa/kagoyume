<?php require_once 'common/nav_bar.php';?>

<html>
<body>

<?php  $ses_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Stranger" ;
  //Cartログ
  $log_content = $ses_name. " move to Cart ";
  writeLog("CART", $log_content);

    // get list in cookie
    if(isset($_COOKIE ['list_code'])){
      $list_code = unserialize ( $_COOKIE ['list_code'] );
    }else{
      $list_code = Array();
    }
// remove item from cart
  if(isset($_POST['remove_from_cart'])){
  	$remove_code = $_POST['remove_from_cart'];
    //remove this code from array
  	if(($key = array_search($remove_code, $list_code)) !== false) {
  		unset($list_code[$key]);
  	}
  	// add new list in cookie
  	setcookie ( 'list_code', serialize ( $list_code ), time () + 3600 ); /* expire in 1 hour */

  }
  ?>

  <div class="container">
    <form action="" method="POST">
      <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>Product</th>
                          <th class="text-center">Price</th>
                          <th> </th>
                      </tr>
                  </thead>
                  <tbody>
<?php
 $sum = 0;
 foreach($list_code as $item_code){
    $hit = getItemByCode($item_code);
    $sum += $hit->Price;
  ?>
                      <tr>
                          <td class="col-sm-8 col-md-6">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo $hit->Image->Medium ?>" style="width: 72px; height: 72px;"> </a>
                              <div class="media-body">
                                  <h4 class="media-heading"><a href="#"><?php echo $hit->Name; ?></a></h4>
                              </div>
                          </div></td>
                          <td class="col-sm-3 col-md-3 text-center"><strong><?php echo "¥". $hit->Price; ?></strong></td>
                          <td class="col-sm-1 col-md-1">
                          <button type="submit" class="btn btn-danger" name="remove_from_cart" value="<?php echo $hit->Code;?>">
                              <span class="glyphicon glyphicon-remove"></span> Remove
                          </button></td>
                      </tr>
    <?php } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                          <td>   </td>
                          <td><h3>Total</h3></td>
                          <td class="text-right"><h3>¥<?php echo $sum;?></h3></td>
                      </tr>
                      <tr>
                          <td>   </td>
                          <td>
                          <a href="<?php echo getSearchUrl();  ?>" class="btn btn-default">
                              <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                          </a></td>
                          <td>
                            <?php if(count($list_code) > 0){ ?>
                          <a href="<?php echo BUY_CONFIRM; ?>" class="btn btn-success">
                              Checkout <span class="glyphicon glyphicon-play"></span>
                          </a>
                            <?php } ?>
                        </td>
                      </tr>
                  </tfoot>
              </table>
          </div>
      </div>
    </form>
  </div>
</body>
<html>
