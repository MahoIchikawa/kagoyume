<?php require_once 'common/nav_bar.php';
require_once '../util/scriptUtil.php';

$ses_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Stranger" ;
//TOPpageログ
$log_content = $ses_name. " move to Top page ";
writeLog("TOP", $log_content);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>
<body>
  <div class="container">
    <div class="text-center">
      <h2>Welcome to KagoYume! hope you enjoy :)</h2>
      <br>
      <form class="col-lg-12" action="<?php echo SEARCH;?>" method="GET">
        <!-- Select Basic -->
          <div class="col-sm-3 col-sm-offset-1 input-group-lg">
            <select id="selectbasic" name="category_id" class="form-control">
              <?php foreach ($categories as $id => $name) { ?>
              <option value="<?php echo h($id); ?>"><?php echo h($name);?></option>
              <?php } ?>
            </select>
          </div>

        <div class="input-group input-group-lg col-sm-6 col-sm-offset-1">
          <input type="text" class="center-block form-control input-lg" placeholder="Search item..." required=""
          name="search_term">
          <span class="input-group-btn">
            <button class="btn btn-lg btn-primary" type="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button></span>
        </div>
        <div>
        </div>
      </form>
    </div>

  </div><!-- /.container -->
</body>
<html>
