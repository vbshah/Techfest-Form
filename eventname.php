<?php 
	include 'db.php';
	function filedata($filename){
		$f=fopen($filename.".dat","r");
		$data=fread($f,filesize($filename.".dat"));
		fclose($f);
		return $data;
	}
	function bootcode($s){
		$json=json_decode($s,true);
		$ret='';
		$cat="";
		$space="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
		for($i=0;$i<count($json);$i++){
			if($json[$i]["Category"]!==$cat){
				if($i!=0){
					$ret.="</div></div></div>";
				}
				//title srarts
				$ret.="<div class='panel panel-default'><div class='panel-heading' style='max-height:50px;max-width:300px'><h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#collapse".$GLOBALS['cnt']."'>";
				$ret.="<p style='font-size:150%'>".$json[$i]["Category"]."</p>";
				$ret.="</a></h4></div><hr>";
				//title ends
				if($GLOBALS['flg']==1){
					$GLOBALS['flg']=0;
					$ret.="<div id='collapse".$GLOBALS['cnt']."' class='panel-collapse collapse in'><div class='panel-body'>";
				}
				else $ret.="<div id='collapse".$GLOBALS['cnt']."' class='panel-collapse collapse'><div class='panel-body'>"; 
				$cat=$json[$i]["Category"];
				$GLOBALS['cnt']++;
			}
			$tmp="'".$json[$i]["Title"]."'";
			$ret.="<label for=$tmp>".$json[$i]["Title"]."</label> "."<input type='checkbox' name=$tmp id=$tmp><hr>";
		}
		$ret.="</div></div></div>";
		return $ret;
	}
	global $cnt,$flg;
	$flg=1;
	$cnt=1;
	echo "<h1>Tech</h1>".bootcode(filedata("tech"))."<h1>Non-Tech</h1>".bootcode(filedata("non-tech"))."<h1>Robotics</h1>".bootcode(filedata("robotics"))."<h1>Workshop</h1>".bootcode(filedata("workshop")).bootcode(filedata("entre_sum"));
?>
