<?php
	include 'db.php';
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Semester Registration Form</title>
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="author" content="sairam">
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="registration.js"></script>
	<noscript>Please enable javascript to view properly</noscript>
</head>

<body class="intro">

	<div class="wrapper">
		<div id="main" style="padding:50px 0 0 0">
			<ul class="tabs">
				<li class="tab-link current" data-tab="tab-1">Personal Details</li>
				<a href="registration1.php"><li class="tab-link" data-tab="tab-2" >Select Events</li></a>
				<a href="registration2.php"><li class="tab-link" data-tab="tab-3">Confirmation</li></a>
			</ul>
			<form id="contact-form" action="/" method="post" style=";display:none;" name="registration">
				<div id="tab-1" class="tab-content current">
					<div>
						<label>
							<span>Name:</span>
							<input placeholder="Please enter your full name" type="text" tabindex="1" required autofocus>
						</label>
					</div>
					<div>
						<label>
							<span>Enrollment Number:</span>
							<input placeholder="Enter your enrollment number" type="text" tabindex="2" required>
						</label>
					</div>
					<div>
						<label>
							<span>Phone Number:</span>
							<input placeholder="Please enter your phone number" type="tel" tabindex="3" required>
						</label>
					</div>
					<div>
						<label>
							<span>Email Id:</span>
							<input placeholder="Please enter your email address" type="email" tabindex="4" required>
						</label>
					</div>
					<div>
						<label>
							<span>Select Collaege Name:</span>
							<select tabindex="5" id="collegename">

							</select>
						</label>
					</div>
					<div>
					<div>
						<label>
							<span>Select Semester:</span>
							<select tabindex="5">
								<option selected disabled="true">Please Select Semester</option>
								<option>2</option>
								<option>4</option>
								<option>6</option>
								<option>8</option>
							</select>
						</label>
					</div>
					<div>
							<a href="registration1.html"><button id="next-page" type="button" data-tab="tab-2" data-element=1 tabindex="6">Next</button></a>
					</div>
				</div>
				</div>

			</form>
		</div>
	</div>
</body>
</html>
