<?php
include_once 'nof5.phar';
?>
	<!DOCTYPE html>
	<html lang="en" ng-app="css" class="ng-scope">

	<head>
		<base href="/">
		<link rel="stylesheet" href="../views/css/menu.css">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<link rel="shortcut icon" href="https://s3.amazonaws.com/menumaker-assets/fav.png" type="image/png">
		 CSS -->
		<!-- SCRIPTS -->
	</head>

	<body>
		<!-- /row -->
		<div class="row ">
			<div class="col-md-12">
				<div id="cssmenu">
					<div id="menu-button">Menu</div>
					<ul>
						<!-- target="_blank" -->
						<li class="active"><a href="" data-title="Home">Home</a></li>
						<li><a href="?controller=posts&action=index" data-title="Posts">Posts</a></li>
						<li><a href="?controller=login&action=login" data-title="Login">Login</a></li>
						<li><a href="#" data-title="Contact">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>

	</html>