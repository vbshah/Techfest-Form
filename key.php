<?php 
	session_start();
	session_destroy();	
?>
<html>
<head>
<title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body background="bw5.jpg">
<div class="container" style="color:white">
	<h1>Please Login</h1>
	<form role="form" action="tech.php" method="POST">
	<div class="form-group">
	<label>ID:</label><input type="password" class="form-control" style="width:300px" name="key">
	<br>
	</div>
	<button type="submit" class="btn btn-default">Login</button>
	</form>
</div>
</body>
</html>