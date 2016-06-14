<?php
	include 'db.php';
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	require_once"recaptchalib.php";
	function format($events){
		$s=file_get_contents("mail1.html");
		$tmp=file_get_contents("tech.dat");
		$newevent=array();
		$fee=array();
		$json=json_decode($tmp,true);
		for($i=0;$i<count($json);$i++){
			if(in_array($json[$i]["Title"],$events)){
				array_push($newevent, $json[$i]["Title"]);
				array_push($fee, $json[$i]["Fees"]);
			}
		}
		$tmp=file_get_contents("non-tech.dat");
		$json=json_decode($tmp,true);
		for($i=0;$i<count($json);$i++){
			if(in_array($json[$i]["Title"],$events)){
				array_push($newevent, $json[$i]["Title"]);
				array_push($fee, $json[$i]["Fees"]);
			}
		}
		$tmp=file_get_contents("robotics.dat");
		$json=json_decode($tmp,true);
		for($i=0;$i<count($json);$i++){
			if(in_array($json[$i]["Title"],$events)){
				array_push($newevent, $json[$i]["Title"]);
				array_push($fee, $json[$i]["Fees"]);
			}
		}
		$tmp=file_get_contents("workshop.dat");
		$json=json_decode($tmp,true);
		for($i=0;$i<count($json);$i++){
			if(in_array($json[$i]["Title"],$events)){
				array_push($newevent, $json[$i]["Title"]);
				array_push($fee, $json[$i]["Fees"]);
			}
		}
		$tmp=file_get_contents("entre_sum.dat");
		$json=json_decode($tmp,true);
		for($i=0;$i<count($json);$i++){
			if(in_array($json[$i]["Title"],$events)){
				array_push($newevent, $json[$i]["Title"]);
				array_push($fee, $json[$i]["Fees"]);
			}
		}
		for($i=0;$i<count($newevent);$i++){
			$s.="<tr><td>".$newevent[$i]."</td>".$fee[$i]."</td></tr>";
		}
		$s.=file_get_contents("mail2.html");
		return $s;
	}
	function SendMail( $ToEmail, $MessageHTML, $MessageTEXT ) {
		require_once ('mail/PHPMailerAutoload.php');		
	  require_once ( 'mail/class.phpmailer.php' ); 
	  $Mail = new PHPMailer();
	  $Mail->IsSMTP(); // Use SMTP
	  $Mail->Host        = "smtp.gmail.com"; 
	//  $Mail->SMTPDebug   = 2; 
	  $Mail->SMTPAuth    = TRUE; 
	  $Mail->SMTPSecure  = "tls"; 
	  $Mail->Port        = 587; 
	  $Mail->Username    = ''; // SMTP account username
	  $Mail->Password    = ''; // SMTP account password
	  $Mail->Priority    = 1; 
	  $Mail->CharSet     = 'UTF-8';
	  $Mail->Encoding    = '8bit';
	  $Mail->Subject     = 'GTU Central Techfest 16';
	  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
	  $Mail->From        = 'gtutechfest@gtu.edu.in';
	  $Mail->FromName    = 'GTU TechFect';
	  $Mail->WordWrap    = 900; 

	  $Mail->AddAddress( $ToEmail ); // To:
	  $Mail->isHTML( TRUE );
	  $Mail->Body    = $MessageHTML;
	  $Mail->AltBody = $MessageTEXT;
	  $Mail->Send();
	  $Mail->SmtpClose();

	  if ( $Mail->IsError() ) { // ADDED - This error checking was missing
	    return FALSE;
	  }
	  else {
	    return TRUE;
	  }
	}
	require_once"recaptchalib.php";
	$secret="";
	$response=null;
	$reCaptcha= new reCaptcha($secret);
	if(isset($_POST['g-recaptcha-response'])){
		$response=$reCaptcha->verifyresponse(
			$_SERVER["REMOTE_ADDR"],	
			$_POST["g-recaptcha-response"]);
	}
	if($response==null){
		header('Location:notrobot.php');
	}
	if($response!=null && $response->success){
		include "db.php";
		if(isset($_SESSION["selectedevent"])){
			$enroll=$_SESSION["enrollnum"];
			$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
			$query="select * from techfestdata where enroll='$enroll'";
			if($result=mysqli_query($conn,$query)){
				$row=mysqli_fetch_assoc($result);
				$name=$row['firstname'];
				$enroll=$row['enroll'];
				$phone=$row['phone'];
				$email=$row['email'];
				$college=$row['college'];
				$sem=$row['sem'];	
				$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
				$query="delete from techfestdata where enroll='$enroll'";
				if(!mysqli_query($conn,$query)){
					echo "report error!!";
				}
				$arr=$_SESSION["selectedevent"];
				for ($i=0; $i < count($arr); $i++) { 
					$event=str_replace("_", " ",$arr[$i]);
					$query="INSERT into techfestdata(firstname,email,phone,enroll,college,sem,events) values('$name','$email','$phone','$enroll','$college','$sem','$event')";
					if(!mysqli_query($conn,$query)){
						echo "report error";
					}
				}
				mysqli_close($conn);
				SendMail($email,format($arr),"sorry for Error");
				session_destroy();
				header("Location:congo.php");
			}
		}
	}
	else{ 
		echo "<h1>please report error to administration</h1><br>";
	}
?>
