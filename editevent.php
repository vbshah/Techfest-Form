<?php 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	include 'db.php';
	if((isset($_SESSION["more_error"]) && $_SESSION["more_error"]==1) || isset($_SESSION["pass1"]) && $_SESSION["pass1"]==1 && isset($_SESSION["enrollnum"])){
		$enroll=$_SESSION["enrollnum"];
		include "db.php";
		$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
		$query="select events from techfestdata where enroll='$enroll'";
		$arr=array();
		if($result=mysqli_query($conn,$query)){
			while($row=mysqli_fetch_assoc($result)){
				array_push($arr, $row["events"]);
			}
			$_SESSION["selectedevent"]=$arr;
			mysqli_close($conn);
		}
	}
	else{
		header("Location:edit.php");
	}
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
	function fetch(){
		var ret='';
		$.post("eventname1.php",
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

<body background="bw5.jpg">

<div id="main" style="padding:50px 0 0 0">
<!--			<ul class="tabs">
				<a href="index.php"><li class="tab-link" data-tab="tab-1">Personal Details</li></a>
				<li class="tab-link current" data-tab="tab-2" >Select Events</li>
				<a href="registration2.php"><li class="tab-link" data-tab="tab-3">Confirmation</li></a>
			</ul>-->
<!--			<form id="contact-form" action="/" method="post" style=";display:none;" name="registration"> class="intro"-->
	<div class="container">
	<div class="well">
	<?php 
		if(isset($_SESSION['more_error']) && $_SESSION['more_error']==1){
			echo "<div style='padding-top:50px';padding-left:50px>";
			echo "<div class='alert alert-danger'><strong>Sorry!</strong>You cannot add less than 1 more than 10 events</div>";
			echo "</div>";
			unset($_SESSION["more_error"]);
		}
	?>
	<form action="notrobot.php" method="post">
	<h3>Your Selected Events</h3><br>
	<?php 
		for($i=0;$i<count($arr);$i++)
			echo "<span>".$arr[$i]."&nbsp;<input type='checkbox' checked></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	?>
	</div>
	</div>
	<div class="container">
	  <div class="panel-group" id="accordion">
		<!--
			add accordian here 
		-->
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
