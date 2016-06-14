<?php
	include'db.php';
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	if(!isset($_POST['name']) || !isset($_POST['enrollment']) || !isset($_POST['phone']) || !isset($_POST['email_id']) || !isset($_POST['college']) || !isset($_POST['sem'])){
		header("Location:regis.php");
	}
	if(empty($_POST["name"]) || empty($_POST["enrollment"]) || empty($_POST["phone"]) || empty($_POST["email_id"]) || empty($_POST["college"]) || empty($_POST["sem"])){
		echo $_POST["name"];
		header("Location:regis.php");
	}
	$firstname=$_POST['name'];
	$enroll=$_POST['enrollment'];
	$phone=$_POST['phone'];
	$email=$_POST['email_id'];
	$college=$_POST['college'];
	$sem=$_POST['sem'];
	$error=false;
	$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
	$query="select * from techfestdata where enroll='$enroll'";
	if($result=mysqli_query($conn,$query)){
		while($result=mysqli_fetch_assoc($result)){
				$_SESSION['db_error']="USER already registered";
				header('Location:regis.php');
				echo "q ".$query."<br>";
		}
	}
	$_SESSION['name']=$firstname;
	$_SESSION['enrollment']=$enroll;
	$_SESSION['phone']=$phone;
	$_SESSION['email_id']=$email;
	$_SESSION['college']=$college;
	$_SESSION['sem']=$sem;
	
	if(strlen(trim($firstname,' ')) <3){
		$error=true;
		$_SESSION['fname_error']="Full name is required";
	}
	elseif (strlen($firstname) >25 ){
					$error=true;
				$_SESSION['fname_error']="Full name cannot be greater than 25 characters";
			}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) ){ 
		$error = true;
		$_SESSION['email_error']="Entert valid email address";
	}		
	if(is_int((int)$phone) && strlen($phone)==10){
		$error=false;
	}else{
		$error = true;	
		$_SESSION['ph_error']="Enter valid phone number";
	}	
	if(is_int((int)$enroll)){
		$error=false;
	}else{
		$error = true;
		$_SESSION['en_error']="Enter valid enrollment";
	}	
	if(strlen(trim($college)) <3){
		$error=true;
		$_SESSION['college_error']="Select college name";
	}
	if($error==true){
			header('Location:regis.php');	
		}

?>
