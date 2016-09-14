<?php require_once 'common/nav_bar.php';
$ses_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Stranger" ;
  //HISTORYログ
  $log_content = $ses_name. " move to History ";
  writeLog("HISTORY", $log_content);
?>

<html>
<body>

<?php
if(!isset($_SESSION['id'])){
  echo "<h2 class='text-center text-danger'>Please login before buying!</h2>";
  die;
}

$id =  $_SESSION['id'];
$list_items = myHistory($id); //$idでゲットする
  if(is_array($list_items)){
    if(count($list_items) <= 0){
      echo "<h2 class='text-center text-danger'>History is empty!</h2>";
      die;
     }
   }
  ?>

  <div class="container text-center">
      <div class="row">
          <div class="col-sm-10 col-md-10 col-md-offset-1">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>Product</th>
                          <th class="text-right">Price</th>
                          <th class="text-right">Purchased time</th>
                      </tr>
                  </thead>
                  <tbody>
<?php
 foreach($list_items as $item){
    $hit = getItemByCode($item['itemCode']);
  ?>
                      <tr>
                          <td class="col-sm-6 col-md-6">
                          <div class="media">
                              <p class="thumbnail pull-left"> <img class="media-object" src="<?php echo $hit->Image->Medium ?>" style="width: 72px; height: 72px;"> </p>
                              <div class="media-body">
                                  <h4 class="media-heading text-info"><?php echo $hit->Name; ?></h4>
                              </div>
                          </div></td>
                          <td class="col-sm-2 col-md-2 text-right"><strong><?php echo "¥". $hit->Price; ?></strong></td>
                          <td class="col-sm-2 col-md-2 text-right"><small><?php echo $item['buyDate']; ?></small></td>

                      </tr>
    <?php } ?>

                  </tbody>
              </table>
          </div>
      </div>
  </div>
</body>
<html>
