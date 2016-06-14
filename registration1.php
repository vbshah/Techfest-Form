<?php 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	if(!isset($_SESSION["firstPass"]))
		include "regconfig.php";
	include 'db.php';
	$_SESSION["firstPass"]="1";
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Semester Registration Form</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="author" content="sairam">
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="registration.js"></script>
	<noscript>Please enable javascript to view properly</noscript>
	<style type="text/css">
		body{
/*			background-image: url("bw.jpg");
/			background-size: cover;
*/
		}
	</style>
	<script>
	$(document).ready(function(){
		if ($('input.checkbox_check').is(':checked')) {
			console.log("122");
		}
	});
	function fetch(){
		var ret='';
		$.post("eventname.php",
		{
		},
		function(data,status){
			document.getElementById("accordion").innerHTML=data;
		}
		);
	}
	$(document).ready(function(){
		fetch();
	});
	</script>
</head>

<body>

<div id="main" style="padding:50px 0 0 0">
	<form action="registration2.php" method="post">
	<div class="container">
<?php 
	if(isset($_SESSION['more_error']) && $_SESSION['more_error']==1){
		echo "<div style='padding-top:50px'>";
		echo "<div class='alert alert-danger'><strong>Sorry!</strong>You cannot add more than 10 events</div>";
		echo "</div>";
		unset($_SESSION["more_error"]);
	}
?>
	<br><br>
	  <div class="panel-group" id="accordion">
		
	</div>
	</div>
	<center>
	<input type="submit" class="btn btn-primary btn-lg btn-block" value="Next" style="max-width: 50%;">
</center>
			</form>
		</div>
	<br><br><br><br>
</body>
</html>
