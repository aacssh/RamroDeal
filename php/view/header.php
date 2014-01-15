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
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.css">

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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/jquery-ui.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>favicon.ico" />
  </head>
  <body id="container" class="container">
  <header class="row">
      <section class="col-lg-3 col-sm-3 col-xs-8 hidden-xs">
        <a href="<?php echo $_SERVER['PHP_SELF'];?>"><img src="<?php echo BASE_URL; ?>bootstrap/img/ramrodeal_icon.png" /></a>
      </section>
      <section class="col-lg-9 col-sm-9">
        <form class="form-search hidden-xs">
          <section class="col-lg-4 col-sm-6">
            <span class="btn btn-info text-center">Refer Friends. Get bonus*</span>&nbsp;
          </section>
          <section class="col-lg-4 col-sm-3">
            <section class="input-group">
              <input type="text" <input class="form-control" placeholder="Search: hotels" />
              <span class="input-group-btn">
                <button type="submit" class="btn btn-info">Search</button>
              </span>
            </section>
          </section>
          <section class="col-lg-4 col-sm-3">
            <section class="input-group">
            <input type="text" class="form-control" placeholder="Location: Pokhara">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info">Search</button>
            </span>
          </section>
          </section>
        </form>
      </section>
  </header>
<?php } ?>