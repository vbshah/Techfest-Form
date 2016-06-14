<?php 
	include "db.php";
	$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
	$file = '/home/vbs/backup/mytable.sql';
	if($result = mysqli_query($conn,"SELECT * INTO OUTFILE '$file' FROM `techfestdata`")){
		echo "successful";
	}
	else echo mysqli_error($conn);
	mysqli_close($conn);

?>