<?php 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	include 'db.php';
	if(!isset($_POST['enroll']) || !isset($_POST["passcode"]))
		header("Location:index.php");
	$enroll=$_POST["enroll"];
	$passcode=$_POST["passcode"];
	if(!preg_match("/^[0-9]+$/", $enroll)) 		
		header("Location:index1.php");
	if(!preg_match("/^[a-zA-Z0-9]+$/", $passcode))
		header("Location:index2.php");
	$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
	$query="select * from edit where enroll='$enroll' AND passcode='$passcode'";
	if($result=mysqli_query($conn,$query)){
		$row=mysqli_fetch_assoc($result);
		if(isset($row)){
			$_SESSION["pass1"]=1;
			$_SESSION["enrollnum"]=$enroll;
			echo "s ".$_SESSION["enrollnum"];
			header("Location:editevent.php");
		}
		else{
			header("Location:edit.php");
		}

	}
?>
