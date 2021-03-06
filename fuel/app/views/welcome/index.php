<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Osusowake</title>

    <!-- Bootstrap -->
    <?php echo Asset::css("bootstrap-responsive.css"); ?>
    <?php echo Asset::css("bootstrap-responsive.min.css"); ?>
    <?php echo Asset::css("bootstrap-theme.css"); ?>
    <?php echo Asset::css("bootstrap-theme.min.css"); ?>
    <?php echo Asset::css("bootstrap.css"); ?>
    <?php echo Asset::css("bootstrap.min.css"); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="navbar navbar-default">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">
    <?php echo Asset::img("logo.png"); ?>
  </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/DMTC_Eteam/public/signup">新規会員登録</a></li>
      <li class="dropdown">
      </li>
    </ul>
  </div>
</div>

<div class="header">
	<div class="container">
		<div class="row">
			<h1>osusowake</h1>
			<div class="h1-p">
			<p>お裾分けで素敵な関係を築こう。</p>
    	</div>
  	</div>
		<?php if (isset($error)): ?>
		<?php echo $error ?>
		<?php endif ?>
		<?php echo $form ?>
	</div>
</div>

<!--         <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
      </div>
        <div class="col-lg-10">
<button type="button" class="btn btn-primary btn-lg">ログインする</button>
</div>
 -->

  </body>
</html>