<?php
 require_once 'common/nav_bar.php';
 require_once '../util/scriptUtil.php';

 $item_code = $_GET['item_code'];
 $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$item_code&image_size=600&responsegroup=large";
 $xml = simplexml_load_file($url);
 if ($xml["firstResultPosition"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
     $hit = $xml->Result->Hit;
 }

 ?>
<html>
<body>

  <div class="container" style="margin-bottom: 100px">
  	<div class="row">
  	</div>
  	<div class="row">
  		<!-- Product Info-->
  		<div class="col-xs-12 col-sm-6">
  			<img src="<?php echo h($hit->ExImage->Url); ?>" class="img-responsive product-image-large">
  		</div>
  		<div class="col-xs-12 col-sm-6">
  			<h3 id="product-title" class="text-primary">
  				<?php echo $hit->Name; ?>
  			</h3>

        <h2 ><span class="glyphicon glyphicon-yen color-gold"></span><?php echo $hit->Price;?></h2>
        <b class="text-info">Rating: <?php  echo $hit->Review->Rate;?> <span class="glyphicon glyphicon-star"></span></b>
        <br>
          <div class="btn-group　text-right" role="group">
            <button type="button" class="btn btn-success"><span class="fa fa-plus"></span>&nbsp;Add to Cart</button>
            <button type="button" class="btn btn-danger"><span class="fa fa-close"></span>&nbsp;Cancel</button>
          </div>
        <br>
          <p><?php echo $hit->Description; ?></p>
        </div>

  		</div>
  	</div>
  </div>
</body>
<html>
