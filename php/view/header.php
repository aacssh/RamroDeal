<?php function ramrodeal_header($title){ ?>
<!DOCTYPE html>
<html lang="en" >
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_URL; ?>bootstrap/css/custom.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>bootstrap/css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>favicon.ico" />
  </head>
  <body id="container" class="container">
  <header class="row">
      <section class="col-lg-3 col-md-3 col-sm-5 col-xs-8 hidden-xs">
        <a href="<?php echo $_SERVER['PHP_SELF'];?>"><img src="<?php echo BASE_URL; ?>bootstrap/img/ramrodeal_icon.png" class="img-responsive"/></a>
      </section>
      <section class="col-lg-4 col-lg-offset-1 col-md-4 hidden-sm hidden-xs">
            <span class="btn btn-info text-center">Refer Friends. Get bonus*</span>&nbsp;
          </section>
      <section class="col-lg-4 col-md-5 col-sm-6">
        <form class="form-search" action='<?php echo BASE_URL; ?>php/controller/searchdeal.php'>
          <section class="input-group">
            <input type="text" name="search" class="form-control" placeholder="    Deals">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info">Search</button>
            </span>
          </section>
        </form>
      </section>
  </header>
<?php } ?>