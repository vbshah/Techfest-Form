<?php 
	include "db.php";
	if(isset($_POST["keycode"]) && $_POST["keycode"]=="1235711regis"){
		$query="select count('enroll') from techfestdata";
		if($result=mysqli_query($conn,$query)){
			$rows=mysqli_num_rows($result)
			echo $rows;
		}
		
	}
?>