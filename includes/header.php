<!doctype html>
<?php
	//session_start();
	include('db.php'); 
	require_once('lib/functions.php');
	$home = "index.php";
	//include('functions.php');
	$page = $_GET['page'];
?>
<html lang="en">
	<head>
	<title>NPRecords | Nicholas Palomares</title>
	<link rel="stylesheet" type="text/css" href="styles/main.min.css">
	<link rel="stylesheet" type="text/css" href="styles/custom.css">
	<!-- Scripts -->
	<script type="javascript" src="js/scripts.min.js"></script>
	<script type="javascript" src="js/custom.js"></script>
</head>
<body>
<header class="header">
	<div class="container">
		<div class="row">
			<div class="logo col-sm-4">
				<a href="<?php echo $home; ?>"><img src="http://placehold.it/300x100&text=PHP+My+Records" class="img-reponsive brand" title="" alt="My Record Collection"></a>
			</div>

			<div class="login col-sm-8 text-right">
				<div class="login-box">
					<form action="form_parser.php" method="post">
						<!-- <p> --><input type="text" name="uname" class="uname" placeholder="Username"><!-- </p> -->
						<!-- <p> --><input type="text" name="password" class="pass" placeholder="Pasword"><!-- </p> -->
						<!-- <p> --><input type="submit" name="login" class="btn btn-primary" placeholder="Submit"><!-- </p> -->
					</form>
				</div><!--close login box -->
			</div><!--close login-->
		</div> <!-- close row -->

		<div class="row">
			<div class="menu col-sm-8 col-sm-offset-4">
				<nav class="menu-primary pull-right">
					<ul>
						<li><a href="<?php echo $home; ?>">Home</a></li>
						<li><a href="#">Sandbox</a></li>
					</ul>
				</nav>	
			</div><!--close menu-->
		</div><!-- close row -->	

	</div><!--close container-->
</header>