<?php function ramrodeal_header($title){ ?>
<!DOCTYPE html>
<html lang="en" >
    <head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="/RamroDeal/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/RamroDeal/bootstrap/css/boot.css">
	<link rel="shortcut icon" type="image/x-icon" href="/RamroDeal/favicon.ico" />
    </head>
    <body class="container">
	<header class="row">
	    <section class="span4">
		<a href="<?php echo $_SERVER['PHP_SELF'];?>"><img src="/RamroDeal/bootstrap/img/abcd.jpg" height="200" width="250" /></a>
	    </section>
	    <section class="span8">
		<form class="form-search pull-right">
		    <span class="btn btn-info text-center">Refer Friends. Get bonus*</span>&nbsp;
		    <section class="input-append">
			<input type="text" <input class="span2 search-query" placeholder="Search: hotels" />
			<button type="submit" class="btn btn-info">Search</button>
		    </section>
		    <section class="input-append">
			<input type="text" class="span2 search-query" placeholder="Location: Pokhara">
			<button type="submit" class="btn btn-info">Search</button>
		    </section>
		</form>
	    </section>
	</header>
<?php } ?>