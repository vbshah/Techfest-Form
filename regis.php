<?php 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
		session_destroy();
	}
	include 'db.php';
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Semester Registration Form</title>
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="registration.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var collegename=$("#collegetype").val();
			$.post("collegename.php",
	        {
	        	name:collegename
	        },
	        function(data){
	        	document.getElementById("collegename").innerHTML='<option selected disabled="true">Please Select collegename</option>'+data;
	        }
	    	);
	    $("#collegetype").change(function(){
	       	var collegename=$("#collegetype").val();
	        $.post("collegename.php",
	        {
			name:collegename
	        },
	        function(data){
	            console.log(data);
	            document.getElementById("collegename").innerHTML='<option selected disabled="true">Please Select collegename</option>'+data;
	        }    
	        );
		});
	    });

	</script>
	<noscript>Please enable javascript to view properly</noscript>

</head>

<body class="intro">

	<div class="wrapper">
		<div id="main" style="padding:50px 0 0 0">
<!--			<ul class="tabs">
				<li class="tab-link current" data-tab="tab-1">Personal Details</li>
				<a href="registration1.php"><li class="tab-link" data-tab="tab-2" >Select Events</li></a>
				<a href="registration2.php"><li class="tab-link" data-tab="tab-3">Confirmation</li></a>
			</ul> -->
			<h1 style="color:white">Personal Details</h1>
			<form id="contact-form" action="registration1.php" method="post" style=";display:none;" name="registration">
				<div id="tab-1" class="tab-content current">
					<div>
						<label>
							<span>Name:</span>
							<input placeholder="Please enter your full name" name="name" type="text" tabindex="1"  autofocus>
							<div style="color:red"><?php
								if(isset($_SESSION['fname_error'])){
								echo $_SESSION['fname_error'];
								unset($_SESSION['fname_error']);
							}
								?></div>
								<br>	
						</label>
					</div>
					<div>
						<label>
							<span>Enrollment Number:</span>
							<input placeholder="Enter your enrollment number" name="enrollment"type="text" tabindex="2" >
							<div style="color:red"> <?php
							if (isset($_SESSION['en_error'])) {
								echo $_SESSION['en_error'];
								unset($_SESSION['en_error']);
							}
							if (isset($_SESSION['db_error'])) {
								echo $_SESSION['db_error'];
								unset($_SESSION['db_error']);
							}

								?></div>
								<br>
						</label>
					</div>
					<div>
						<label>
							<span>Phone Number:</span>
							<input placeholder="Please enter your phone number" name="phone" type="tel" tabindex="3" >
								<div style="color:red"><?php
								if( isset($_SESSION['ph_error']))	
								{
									echo $_SESSION['ph_error'];
									unset($_SESSION['ph_error']); 
								}
								?></div>
								<br>
						</label>
					</div>
					<div>
						<label>
							<span>Email Id:</span>
							<input placeholder="Please enter your email address" name="email_id" 	type="email" tabindex="4">
							<div style="color:red"><?php
							if(isset($_SESSION['email_error'])){
								echo $_SESSION['email_error'];
								unset($_SESSION['email_error']);
							}
							?></div>
								<br>
						</label>
					</div>
					<div>
						<label>
							<span>Select College Field:</span>
						</label>
							<select tabindex="5" id="collegetype">
								<option>BE</option>
								<option>B-Pharm</option>
								<option>Diploma</option>
								<option>Diploma-Pharmacy</option>
								<option>MBA</option>
								<option>MCA</option>
							</select>
					</div>
					<div>
						<label>
							<span>Select College Name:</span>
							<select tabindex="5" id="collegename" name="college">
							<!-- names will be implemented here
							-->
							</select>
								<div style="color:red"><?php
								if(isset($_SESSION['college_error']))
								{
								echo $_SESSION['college_error'];
								unset($_SESSION['college_error']);
								}
								?></div>
								<br>
						</label>
					</div>
					<div>
					<div>
						<label>
							<span>Select Semester:</span>
							<select tabindex="5" id="sem" name="sem">
								<option>2</option>
								<option>4</option>
								<option>6</option>
								<option>8</option>
							</select>
							<div style="color:red"><?php
								if(isset($_SESSION['sem_error']))
								{
								echo $_SESSION['sem_error'];
								unset($_SESSION['sem_error']);
								}
								?></div>
								<br>
						</label>
					</div>
					<!--<div>
					<input id="next-page" type="submit" data-tab="tab-2" data-element=tabindex="6" value='next' style="font-size:150%">
					</div>
					-->
						<center>
			<input type="submit" value=" Next " id="contact-submit" style="cursor:pointer;
	font-size: 1em;
	width:100%;
	border:none;
	background:#565695;
	align-self: center;
	color:#FFF;
	margin:0 0 5px;
	padding:10px;
	border-radius:5px;
	margin-top: 20px;">
		</center>

				</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
