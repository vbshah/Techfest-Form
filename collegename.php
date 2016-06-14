<?php 
	if(!isset($_POST['name']))
		header("Location:regis.php");
	else if(strlen($_POST["name"])==0)
		header("Location:http://www.google.com");
	$f=fopen($_POST['name'].".txt","r");
	if($f){
		while(($line=fgets($f))!==false){
			echo "<option>".$line."</option>";
		}
		fclose($f);
	}
	else{
		echo "can't load collegename";
	}
?>
