<?php
 require_once 'common/nav_bar.php';
 require_once '../util/scriptUtil.php'; //共通ファイル読み込み(使用する前に、appidを指定してください。)

//$search_term = $_GET['search_term'];

$hits = array();
$query = !empty($_GET["search_term"]) ? $_GET["search_term"] : "";
$sort =  !empty($_GET["sort"]) && array_key_exists($_GET["sort"], $sortOrder) ? $_GET["sort"] : "-score";
$category_id = ctype_digit($_GET["category_id"]) && array_key_exists($_GET["category_id"], $categories) ? $_GET["category_id"] : 1;

if ($query != "") {
    $query4url = rawurlencode($query);
    $sort4url = rawurlencode($sort);
    $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url";
    $xml = simplexml_load_file($url);
    if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
        $hits = $xml->Result->Hit;
    }
}

 ?>
 <html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>Searching items</title>
    </head>
   <div class="container">
       <div class="well well-sm">
           <strong>Category Title</strong>
           <div class="btn-group">
               <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
               </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                   class="glyphicon glyphicon-th"></span>Grid</a>
           </div>
       </div>
       <div id="products" class="row list-group">

 <body>
     <form action="<?php SEARCH ?>" class="Search">
     表示順序:
     <select name="sort">
     <?php foreach ($sortOrder as $key => $value) { ?>
     <option value="<?php echo h($key); ?>" <?php if($sort == $key) echo "selected=\"selected\""; ?>><?php echo h($value);?></option>
     <?php } ?>
     </select>
     キーワード検索：
     <select name="category_id">
     <?php foreach ($categories as $id => $name) { ?>
     <option value="<?php echo h($id); ?>" <?php if($category_id == $id) echo "selected=\"selected\""; ?>><?php echo h($name);?></option>
     <?php } ?>
     </select>
     <input type="text" name="search_term" value="<?php echo $query; ?>"/>
     <input type="submit" value="Yahooショッピングで検索"/>
     </form>
     <?php
          for ($i = 0; $i <12; $i++) {
            $hit = $hits[$i];
      ?>
        <div class="item  col-xs-4 col-lg-4">
           <div class="thumbnail">
              <?php $item_code = h($hit->Code);?>
               <a href="<?php echo ITEM .'?item_code='. h($hit->Code); ?>">
               <img class="group list-group-image" src="<?php echo h($hit->Image->Medium); ?>"/>
               <div class="caption">
                   <h4 class="group inner list-group-item-heading" style="height: 35px;">
                         <a href="<?php echo ITEM .'?item_code='. h($hit->Code); ?>"><?php echo mb_substr($hit->Name,0,20, 'utf-8').'...'; ?></a></h4>
                   <p class="group inner list-group-item-text" style="height: 100px;">
                       <?php echo mb_substr($hit->Description,0,100, 'utf-8') . '...'; ?></p>
                   <div class="row">
                       <div class="col-xs-12 col-md-6">
                           <p class="lead">
                           <b><span class="glyphicon glyphicon-yen"></span><?php echo h($hit->Price); ?></b></p>
                       </div>
                       <div class="col-xs-12 col-md-6">
                           <a class="btn btn-success" href="<?php CART ?>">Add to cart</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
     <?php  }?>

       </div>
  </div>

<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->
    </body>
</html>
