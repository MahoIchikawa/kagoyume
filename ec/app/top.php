<?php require_once 'common/nav_bar.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>

<body>
  <div class="container">
    <div class="text-center">
      <h2>Welcome to MyshoppingSite! hope you enjoy :)</h2>
      <br>
      <form class="col-lg-12" action="<?php echo SEARCH;?>" method="GET">
        <div class="input-group input-group-lg col-sm-offset-4 col-sm-4">
          <input type="text" class="center-block form-control input-lg" placeholder="Search item..."
          name="search_term">
          <span class="input-group-btn">
            <button class="btn btn-lg btn-primary" type="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button></span>
        </div>
      </form>
    </div>

  </div><!-- /.container -->
</body>
<html>
