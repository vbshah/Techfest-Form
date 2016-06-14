<?php 
	if(!isset($_REQUEST["key"]) || !($_REQUEST["key"]=="1235711regis")){
		echo "<h1>You Dont Belong Here! Fella</h1>";
	}
	else{
?>
<html>
<head>
	<title>It's Live</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
td{
	height:30px;
	padding-right:10px;
	padding-left:10px;
}
th{
	height:50px;
	padding-right:20px;
	padding-left:20px;
}
</style>
<script>
function PlaySound(soundObj) {
  var sound=new Audio("success.mp3");
  sound.play();
}
	var last="0";
	function updatecounter(){
		console.log("inside");
		$.post("test1.php",
		{
			keycode:'1235711regis'
		},function(data,status){
			if(data!=last && parseInt(data)-parseInt(last)>=5){
				PlaySound("sound1");
				last=data;
				$("#counter").html("total "+data);
			}
			console.log("data "+data);
		});
		setTimeout(updatecounter,30000);
	}
</script>
<body onload="updatecounter()">
<?php 
	include "db.php";
	if(isset($_REQUEST["key"]) && $_REQUEST["key"]=="1235711regis"){
		echo "<div class='container'>";
		echo "<table class='table-responsive table-bordered'>";
		echo "<thead><tr><th>Index</th><th>Event Name</th><th>Total</th></tr></thead>";
		$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
		$query="select * from techfestdata";
		if($result=mysqli_query($conn,$query)){
			$arr=array();
			$total=0;
			while($row=mysqli_fetch_assoc($result)){
				if(!array_key_exists($row["events"], $arr)){
				    $arr[$row["events"]] =1;
				}
				else{
					$arr[$row["events"]]++;
				}
			}
			asort($arr);
			$index=1;
			$arr=array_reverse($arr);
			foreach ($arr as $key => $value) {
				echo "<tr><td>$index</td><td>";
				echo $key."</td><td>".$value."</td></tr>";
				$total+=$value;
				$index++;
			}
			echo "<div style='font-size:250%' id='counter'>total ".$total."</div>";
			echo "</table></div>";
		}
		else{
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>
<embed src="success.mp3" autostart="false" width="0" height="0" id="sound1"
enablejavascript="true">
</body>
</html>
<?php 
	}
?>