<?php
	include "db.php";
	session_start();
    include 'mail/PHPMailerAutoload.php';
	require_once"recaptchalib.php";
	function format($events,$enroll,$passcode){
		$s=file_get_contents("mail1.html");
		$s.="<div style='border: 1px solid black; font-size: 20px; width: 40%';>	Enrollment Number$enroll: <br>	Password:$passcode</div>";
		$s.="<p>	The registration fees details are: </p><table style='text-align: center; width: 40%; ''>	<thead>		<th>Event</th>		<th>Fees</th></thead>";
		$newevent=array();
		$fee=array();
		$tmp=file_get_contents("tech.dat");
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
	  require_once ( 'mail/class.phpmailer.php' ); 
	  $Mail = new PHPMailer();
	  $Mail->IsSMTP(); 
	  $Mail->Host        = "smtp.gmail.com"; 
	//  $Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
	  $Mail->SMTPAuth    = TRUE; 
	  $Mail->SMTPSecure  = "tls"; 
	  $Mail->Port        = 587; 
	  $Mail->Username    = ''; // SMTP account username
	  $Mail->Password    = ''; // SMTP account password
	  $Mail->Priority    = 1; 
	  $Mail->CharSet     = 'UTF-8';
	  $Mail->Encoding    = '8bit';
	  $Mail->Subject     = 'Welcome to GTU central techfest';
	  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
	  $Mail->From        = 'vbshah5091@gmail.com';
	  $Mail->FromName    = 'Central techfest';
	  $Mail->WordWrap    = 9000; 

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

	function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}
	$secret="";
	$response=null;
	$reCaptcha= new reCaptcha($secret);
	if(isset($_POST['g-recaptcha-response'])){
		$response=$reCaptcha->verifyresponse(
			$_SERVER["REMOTE_ADDR"],	
			$_POST["g-recaptcha-response"]);
	}
	if($response==null){
		header('Location:registration2.php');
	}
	if(!isset($_SESSION['name']) || !isset($_SESSION['enrollment']) || !isset($_SESSION['phone']) || !isset($_SESSION['email_id']) || !isset($_SESSION['college']) || !isset($_SESSION['sem'])){
		header("Location:regis.php");
	}

	if(empty($_SESSION['name']) || empty($_SESSION['enrollment']) || empty($_SESSION['phone']) || empty($_SESSION['email_id']) || empty($_SESSION['college']) || empty($_SESSION['sem'])){
		header("Location:regis.php");
	}
	$name=$_SESSION['name'];
	$enroll=$_SESSION['enrollment'];
	$phone=$_SESSION['phone'];
	$email=$_SESSION['email_id'];
	$college=$_SESSION['college'];
	$sem=$_SESSION['sem'];	
	if($response!=null && $response->success){
		if(isset($_SESSION["events"])){
			$arr=$_SESSION["events"];
			$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
			for ($i=0; $i < count($arr); $i++) { 
				$event=$arr[$i];
/*				$query="INSERT into techfestdata(firstname,email,phone,enroll,college,sem,events) 	VALUES('".$name."','".$email."','".$phone."','".$enroll."','".$college."','".$sem."','".str_replace("_", " ",$arr[$i])."')";
*/
				$q="select * from table_name where USER_NAME='$name'";
				$query="INSERT into techfestdata(firstname,email,phone,enroll,college,sem,events) VALUES('$name','$email','$phone','$enroll','$college','$sem','$event')";
				if($result=mysqli_query($conn,$query)){
					$_SESSION['success_id']="succcessfully registered";
					//$row=mysqli_fetch_assoc($result);
				}
				else{
					echo "<h1>please report error at gtutechfest@gtu.edu.in</h1><br>";
				}
			}
			mysqli_close($conn);
			$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
			$code=randomPassword();
			$query="INSERT into edit (enroll,passcode) values('$enroll','$code')";
			if(mysqli_query($conn,$query)){
				mysqli_close($conn);
				if(SendMail($email,format($arr,$enroll,$code),"sorry for Error")==TRUE){
					echo "mail sent";
					header("Location:congo.php");
				}
				else{
					session_destroy();				
				}
			}
			else{
				echo "sorry!!please report this error at gtutechfest@gtu.edu.in";
				session_destroy();
			}
		}
	}
	else{ 
		echo "<h1>please report error at gtutechfest@gtu.edu.in</h1><br>";
		session_destroy();
	}
?>
