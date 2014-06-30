<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <?php echo Asset::css("bootstrap-responsive.css"); ?>
    <?php echo Asset::css("bootstrap-responsive.min.css"); ?>
    <?php echo Asset::css("bootstrap-theme.css"); ?>
    <?php echo Asset::css("bootstrap-theme.min.css"); ?>
    <?php echo Asset::css("bootstrap.css"); ?>
    <?php echo Asset::css("bootstrap.min.css"); ?>
    <?php echo Asset::css('mypage/bootstrap.css'); ?>
    <?php echo Asset::css('mypage/bootstrap.min.css'); ?>
    <?php echo Asset::css('mypage/bootstrap-responsive.css'); ?>
    <?php echo Asset::css('mypage/bootstrap-responsive.min.css'); ?>
    <?php echo Asset::css('mypage/bootstrap-theme.css'); ?>
    <?php echo Asset::css('mypage/bootstrap-theme.min.css'); ?>
    <?php echo Asset::css('posts/bootstrap.css'); ?>
    <?php echo Asset::css('posts/bootstrap.min.css'); ?>
    <?php echo Asset::css('posts/bootstrap-responsive.css'); ?>
    <?php echo Asset::css('posts/bootstrap-responsive.min.css'); ?>
    <?php echo Asset::css('posts/bootstrap-theme.css'); ?>
    <?php echo Asset::css('posts/bootstrap-theme.min.css'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
  body { margin: 40px; }
  * {
    font-family: Verdana, Arial, sans-serif;
  }
  a:link {
    color:#000;
    text-decoration: none;
  }
  a:visited {
    color:#000;
  }
  a:hover {
    color:#33F;
  }

  .button {
    background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
    border: 1px solid #076bd2;
    border-radius: 3px;
    color: #fff;
    display: none;
    font-size: 13px;
    font-weight: bold;
    line-height: 1.3;
    padding: 8px 25px;
    text-align: center;
    text-shadow: 1px 1px 1px #076bd2;
    letter-spacing: normal;
  }
  .center {
    padding: 10px;
    text-align: center;
  }
  .final {
    color: black;
    padding-right: 3px;
  }
  .interim {
    color: gray;
  }
  .info {
    font-size: 14px;
    text-align: center;
    color: #777;
    display: none;
  }
  .right {
    float: right;
  }
  .sidebyside {
    display: inline-block;
    width: 45%;
    min-height: 40px;
    text-align: left;
    vertical-align: top;
  }
  #headline {
    font-size: 40px;
    font-weight: 300;
  }
  #info {
    font-size: 20px;
    text-align: center;
    color: #777;
    visibility: hidden;
  }
  #results {
    font-size: 14px;
    font-weight: bold;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
    min-height: 150px;
  }
  #start_button {
    border: 0;
    background-color:transparent;
    padding: 0;
  }
</style>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  </head>
  <body>
  <div class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      <?php echo Asset::img("logo.png"); ?>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/DMTC_Eteam/public/">ログアウト</a></li>
      <li class="dropdown">
      </li>
    </ul>
  </div>
	<div class="container">
		<div class="col-md-12">
      <?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p><?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?></p>
			</div><?php endif; ?><?php if (Session::get_flash('error')): ?>
			<div class="alert alert-error">
				<strong>Error</strong>
				<p><?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?></p>
			</div><?php endif; ?>
		</div>
		<div class="col-md-12"><?php echo $content; ?>
    </div>
	</div>
</body>
</html>
