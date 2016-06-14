<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
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
	echo "<table class='table table-striped'>";
	$cnt=0;
	for($i=0;$i<count($str_key);$i++){
		echo "<tr>";
		echo "<td>".$str_key[$i]."</td><td>".substr(md5($str_key[$i]),0,5)."</td></tr>";
		$cnt++;
	}
	echo "</table>";
	echo "<h2>Total events ".$cnt."</h2>";
//	print_r(array_count_values($str_key));
?>
</body>
</html>