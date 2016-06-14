<?php
include 'db.php';

?>
<html>
<head>
<title>Modify your event list</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style type="text/css">
body {
    background-image: url('bw5.jpg');
}
  </style>
</head>
<body background="bw5.jpg" style="color: white">
<div class="container">
	<h1>Please Login</h1>
	<form role="form" action="edit1.php" method="POST">
	<div class="form-group">
	<label>Enrollment number:</label><input type="text" class="form-control" style="width:300px" name="enroll">
	<br>
	<label> Passcode:</label><input type="password" class="form-control" 
	style="width:300px" name="passcode">
	</div>
	<button type="submit" class="btn btn-default">Login</button>
	</form>
</div>
</body>
</html>
