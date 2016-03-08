<?php

//mode 1 = Blokjes
//mode 2 = Caesar

if(isset($_GET["mode"]) && !empty($_GET["mode"])){
	$m = $_GET["mode"];
	if($m != 2) $m = 1;
}
else $m = 1;


if($m == 1){
	$max = 3;
	$text = "view/blokjes.php";
	$blokWeight = "bold";
	$caesarWeight = "normal";
}
else if ($m == 2){
	$max = 1000;
	$text = "view/caesar.php";
	$blokWeight = "normal";
	$caesarWeight = "bold";
}


$error = "Dit is geen geldige invoer, probeer opnieuw.";

if(isset($_POST["input-data"]) && !empty($_POST["input-data"])){
	$data = intval($_POST["input-data"]);
	if ($m == 1){			//Verwerking blokjes
		if(is_int($data) && $data >= 1 && $data <=100){
			$blokjes = 0;
			for($i=1; $i<=$data; $i++){
				$blokjes += pow($i,3);
			}
			$output = "Aantal blokjes nodig voor " . $data . " kubussen = <br />" . $blokjes;
		}
		else $output = $error;
	}
	else if ($m == 2){	//Verwerking Caesar
		//validatie
		//if(){
			//logica
		$output = $caesar;
		//}
		//else $output = $error;
	}
}
else $output = "  ";

include("view/view.php");
?>