<html>
<head>
		<title> dashboard </title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 		 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php
	include 'db.php';
	session_start();
	if(!isset($_POST["key"])){
		header("Location:key.php");
	}
	$key=$_POST["key"];
	$str_key = array();
	$str=file_get_contents("tech.dat");
	$json=json_decode($str,true);
	for($i=0;$i<count($json);$i++){
		array_push($str_key,$json[$i]["Title"]);	
	}
	$str=file_get_contents("non-tech.dat");
	$json=json_decode($str,true);
	for($i=0;$i<count($json);$i++){
		array_push($str_key,$json[$i]["Title"]);	
	}
	$str=file_get_contents("robotics.dat");
	$json=json_decode($str,true);
	for($i=0;$i<count($json);$i++){
		array_push($str_key,$json[$i]["Title"]);	
	}
	$str=file_get_contents("workshop.dat");
	$json=json_decode($str,true);
	for($i=0;$i<count($json);$i++){
		array_push($str_key,$json[$i]["Title"]);	
	}
	$str=file_get_contents("entre_sum.dat");
	$json=json_decode($str,true);
	for($i=0;$i<count($json);$i++){
		array_push($str_key,$json[$i]["Title"]);	
	}
	$str=file_get_contents("pharmacy.dat");
	$json=json_decode($str,true);
	for($i=0;$i<count($json);$i++){
		array_push($str_key,$json[$i]["Title"]);	
	}

	array_push($str_key, "Mini Militia");
	array_push($str_key,"C-Quiz & Debugging");
	array_push($str_key,"NFS Most Wanted");
	array_push($str_key,"Quiz");
	array_push($str_key, "Escape The Hell");
	array_push($str_key,"A Minute To Win");
	array_push($str_key, "Glide-O-Mania");
	array_push($str_key, "Robo Sportyf");
	array_push($str_key, "Metal Battle/ Robo War");
	array_push($str_key, "Robo – Collector");
	array_push($str_key, "Robocopter");
	array_push($str_key, "Robozzle");
	array_push($str_key, "RoboMat");
	array_push($str_key, "HYD-R0-B0T (The Das Gleitboot)");
	array_push($str_key, "Rainbow Rider (Line Follower)");
	array_push($str_key, "Counter Strike");
	array_push($str_key, "Learn Arduino With Home Automation");
	array_push($str_key, "Ethical Hacking");
	array_push($str_key, "3D Printer");
	array_push($str_key, "Drone Making");
	array_push($str_key,"E-Treasure Hunt-Crack");	
	array_push($str_key,"Zodiac");	
	array_push($str_key,"Chain Reaction - Contraption");	
	array_push($str_key,"Junkyard");	
	array_push($str_key,"Quick Page");
	array_push($str_key,"Chem-O-Hunt");
	array_push($str_key, "Logical Hunt");
	array_push($str_key, "Laser Maze");
	array_push($str_key,"Mecha Treasure Hunt");
	array_push($str_key,"Being Sherlock");
	array_push($str_key,"Maze Runner");
	array_push($str_key,"Youth Parliament");
	array_push($str_key,"Mecha Treasure Hunt");
	array_push($str_key, "Cyberhunt");
	array_push($str_key, "DIY Google Carboard");
	array_push($str_key, "Tremor Terror");
	$flg=0;
	for($i=0;$i<count($str_key);$i++){
		//	echo $str_key[$i]."=> ".substr(md5($str_key[$i]),0,5)."<br>";
		if(substr(md5($str_key[$i]),0,5)==$key){
			$event=$str_key[$i];
			$conn=mysqli_connect("localhost",$usrname,$pwd,"registration");
			$result=mysqli_query($conn,"SELECT * from techfestdata where events='$event'");
			$flg=1;
			echo "<h2>Event-Name : ".$str_key[$i]."</h2><br>";
			break;
		}
	}
	if($flg==0) header("Location:key.php");

?>
			<table class="table table-bordered">
				<tr>
					<th> FIRSTNAME </th>
					<th> EMAIL </th>
					<th> PHONE </th>
					<th> ENROLLMENT </th>
					<th> COLLEGE </th>
					<th> SEM </th>
				</tr>
				<?php
				$cnt=0;
				 while ($row=mysqli_fetch_assoc($result)) {
					if(!empty($row["enroll"])){
					echo '<tr><td>' .$row['firstname']. '</td>';
					echo '<td>' .$row['email']. '</td>';
					echo '<td>' .$row['phone']. '</td>';
					echo '<td>' .$row['enroll']. '</td>';
					echo '<td>' .$row['college']. '</td>';
					echo '<td>' .$row['sem']. '</td></tr>';
					$cnt++;
					} 
				}
				echo "<h2>Total registration ".$cnt."</h2>";
				?>
			 </table>
		</div>
		</body>
</html>
