<?php 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	if(!isset($_SESSION["enrillnum"])){
		header("Location:edit.php");
	}
	function filedata($filename){
		$f=fopen($filename.".dat","r");
		$data=fread($f,filesize($filename.".dat"));
		fclose($f);
		return $data;
	}
	$json=json_decode(filedata("tech"),true);
	$arr=array();
	for($i=0;$i<count($json);$i++){
		array_push($arr,str_replace(" ","_",$json[$i]["Title"]));
	}
	$json=json_decode(filedata("non-tech"),true);
	for($i=0;$i<count($json);$i++){
		array_push($arr,str_replace(" ","_",$json[$i]["Title"]));
	}
	$json=json_decode(filedata("robotics"),true);
	for($i=0;$i<count($json);$i++){
		array_push($arr,str_replace(" ","_",$json[$i]["Title"]));
	}
	$json=json_decode(filedata("workshop"),true);
	for($i=0;$i<count($json);$i++){
		array_push($arr,str_replace(" ","_",$json[$i]["Title"]));
	}
	$json=json_decode(filedata("entre_sum"),true);
	for($i=0;$i<count($json);$i++){
		array_push($arr,str_replace(" ","_",$json[$i]["Title"]));
	}

	$cnt=0;
	$events=array();
	for ($i=0; $i < count($arr); $i++) {
		if(isset($_POST[$arr[$i]])){
			array_push($events, $arr[$i]);
			$cnt++;
		}
		$_SESSION["selectedevent"]=$events;
	}
	if($cnt>=10 || $cnt==0){
		$_SESSION['more_error']=1;
		header("Location:editevent.php");
	}
?>
