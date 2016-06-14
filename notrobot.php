<?php
	include'db.php';
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	if(isset($_SESSION["pass1"]) && $_SESSION["pass1"]==1){
		include "validation1.php";
	}
	else 
		header("Location:editevent.php");
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Semester Registration Form</title>
	<script src='http://www.google.com/recaptcha/api.js'></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="author" content="sairam">
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet">
	<script src="registration.js"></script>
	<noscript>Please enable javascript to view properly</noscript>
</head>

<body class="intro">

	<div class="wrapper">
		<div id="main" style="padding:50px 0 0 0">
			<form id="contact-form" action="confirm.php" method="post" style=";display:none;" name="registration">

				<div id="tab-3" class="tab-content current">
				<h1 style="color:white">Please Pass This Verification</h1>
				<div class="g-recaptcha" data-sitekey="6Lcx6hgTAAAAAE9r4Qj63hnYlusda2BF1erUmE1Q" data-theme="dark"></div>
					<div>
						<button name="next" type="submit" id="contact-submit">Submit</button>
						<div style="color:white">
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
</body>
</html>
