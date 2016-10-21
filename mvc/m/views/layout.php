<!DOCTYPE html>
<html>

<head>
	<title> Home
	</title>
	<link rel="stylesheet" href="views/css/bootstrap.css">
	<style>

	</style>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.js"> </script>
	<script>
      $(function () {

        $('table').click(function () {
          alert('div clicked');
        });
      });
      </script>
</head>

<body>
	<div class="container">
		<header>
			<?php include_once('menu.php'); ?>
			<!--<a href="../m/">Home</a>
			<a href="?controller=posts&action=index">Posts</a>
      <div class="container-fluid">
        <button class="btn-warning " value="1">ABC</button>
        
      </div>
			-->
		 </header>

    <div class="container-fluid row">
      <?php require_once('routes.php'); ?>
    </div>
		

		<footer class="btn-primary">
			Copyright ©
			<br> &nbsp;
			</br>
			&nbsp;
		 </footer>

	</div>

</body>

</html>