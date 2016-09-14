<?php require_once 'common/nav_bar.php';?>

<html>
<body>

<?php
if(!isset($_SESSION['username'])){
  echo "<h2 class='text-center text-danger'>Please login before buying!</h2>";
  die;
}

 $ses_name = $_SESSION['username'];

  //Buyログ
  $log_content = $ses_name. " move to buy confirm ";
  writeLog("BUY_CONFIRM", $log_content);

    // get list in cookie
    if(isset($_COOKIE ['list_code'])){
      $list_code = unserialize ( $_COOKIE ['list_code'] );
    }else{
      $list_code = Array();
    }
  ?>

  <div class="container text-center">
    <legend> <h2 class="text-danger">Are you sure you want to buy these items?</h2></legend>
    <form action="<?php echo BUY_COMPLETE; ?>" method="POST">
      <div class="row">
          <div class="col-sm-8 col-md-8 col-md-offset-2">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>Product</th>
                          <th class="text-right">Price</th>
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
                          <td class="col-sm-8 col-md-8">
                          <div class="media">
                              <p class="thumbnail pull-left"> <img class="media-object" src="<?php echo $hit->Image->Medium ?>" style="width: 72px; height: 72px;"> </p>
                              <div class="media-body">
                                  <h4 class="media-heading text-info"><?php echo $hit->Name; ?></h4>
                              </div>
                          </div></td>
                          <td class="col-sm-4 col-md-4 text-right"><strong><?php echo "¥". $hit->Price; ?></strong></td>
                          <input type="hidden" name ="item_codes[]" value="<?php echo $hit->Code; ?>"
                      </tr>
    <?php } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                          <td><h3>Total</h3></td>
                          <td class="text-right"><h3>¥<?php echo $sum;?></h3></td>
                      </tr>
                      <tr>
                          <td><h4>Shipping Type</h4></td>
                          <td class="col-md-5">
                            <?php foreach ($shipping_types as $id => $name) { ?>
                              <label class="radio-inline">
                                <input type="radio" name="shipping_type" value="<?php echo $id; ?>"
                                <?php if($id == 0) echo "checked = 'checked';"?>> <?php echo $name;?>
                              </label>
                              <?php } ?>
                          </td>
                      </tr>

                      <tr>
                          <td class="text-right">
                          <a href="<?php echo CART;?>" class="btn btn-danger">Cancel</a>
                          </td>
                          <td>
                            <?php if(count($list_code) > 0){ ?>
                            <button type="submit" class="btn btn-success">Buy <span class="glyphicon glyphicon-play"></span></button>
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
