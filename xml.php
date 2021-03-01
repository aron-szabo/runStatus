<?php
$url='http://lamp10.skilouise.com/app/mtnxml.php';
$xml = simplexml_load_file($url);

$statusArrayLowerFrontSide=[];
$statusArrayUpperFrontSide=[];
$statusArrayGrizzlyGondola=[];
$statusArrayPtarmigan=[];
$statusArrayEagleRidge1and2=[];
$statusArrayEagleRidge3=[];
$statusArrayParadiseBowl=[];
$statusArrayEagleRidge6and7=[];
$statusArraySaddleBackBowl=[];
$statusArrayWhiteHorn1=[];
$statusArrayWhiteHorn2=[];

$lowerFrontSide = [1,2,3,4,5,6,7,8,9,10,12,13,14];
$upperFrontSide = [17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44];
$grizzlyGondola = [48,49,50,51,52,53,54,55,56,57,58,59,60];
$ptarmigan = [62,63,64,65,66,67,68,69,75,76,77,78,79,80];
$eagleRidge1and2 = [83,84,85,86,87];
$eagleRidge3 = [88,89,90,91,92,93];
$paradiseBowl = [94,95,96,97,98,99,100];
$eagleRidge6and7 = [82,101,102,103,104,105,106,107,108];
$saddleBackBowl = [109,110,111,112,113,114,115,116];
$whiteHorn1 = [117,118,119,120,121,122];
$whiteHorn2 = [124,125,126,127,128,129,130,131,132];

foreach($xml->facilities->areas->area as $area){
	foreach($area->trails->trail as $trail){
		
		$id=(string)$trail->attributes()->id;
		if((string)$trail->attributes()->status == 'Open'){
			$open=0;
		}else{
			$open=0;
		}
		
		if(in_array($id,$lowerFrontSide)){
			array_push($statusArrayLowerFrontSide,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$upperFrontSide)){
			array_push($statusArrayUpperFrontSide,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$grizzlyGondola)){
			array_push($statusArrayGrizzlyGondola,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$ptarmigan)){
			array_push($statusArrayPtarmigan,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$eagleRidge1and2)){
			array_push($statusArrayEagleRidge1and2,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$eagleRidge3)){
			array_push($statusArrayEagleRidge3,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$paradiseBowl)){
			array_push($statusArrayParadiseBowl,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$eagleRidge6and7)){
			array_push($statusArrayEagleRidge6and7,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$saddleBackBowl)){
			array_push($statusArraySaddleBackBowl,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$whiteHorn1)){
			array_push($statusArrayWhiteHorn1,array("id"=>$id,"status"=>$open));
		}else if(in_array($id,$whiteHorn2)){
			array_push($statusArrayWhiteHorn2,array("id"=>$id,"status"=>$open));
		}
		


				
	}
}

function customSort($a,$b){
	return $a['id'] > $b['id'] ? 1: -1;
}

function makeTable($makeTableArray, $divID,$title){
	
	usort($makeTableArray,'customSort');
	print_r('<div class="areaContainer" id='.$divID.'>');
	print_r("<h1 class='areaHeader'>".$title."</h1>");
	
	foreach($makeTableArray as $run){
		$src='imgs/'.$run['id'].'-'.$run['status'].'.png';
		print_r('<img class="statusImage" src='.$src.'>');	
	}
	
	print_r('</div>');
	
}

?>