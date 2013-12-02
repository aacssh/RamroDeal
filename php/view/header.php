<?php function ramrodeal_header($title){ ?>
<!DOCTYPE html>
<html lang="en" >
    <head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="/RamroDeal/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/RamroDeal/bootstrap/css/boot.css">
    </head>
    <body>
	<div class="container">
		<!-- header content -->
		<div class="row">
			<div class="span4">
				<a href="/RamroDeal/php/index.php"><img src="/RamroDeal/bootstrap/img/abcd.jpg" height="200" width="250" /></a>
			</div>
			<div class="span8">

			<!-- header content -->
		       
			<form class="form-search pull-right">
			    <span class="btn btn-info text-center">Refer Friends. Get bonus*</span>&nbsp;
			    <div class="input-append">
				<input type="text" <input class="span2 search-query" placeholder="Search: hotels" />
				<button type="submit" class="btn btn-info">Search</button>
			    </div>
			    <div class="input-append">
				<input type="text" class="span2 search-query" placeholder="Location: Pokhara">
				<button type="submit" class="btn btn-info">Search</button>
			    </div>
			</form>
		</div>
	    </div>
<?php } ?>