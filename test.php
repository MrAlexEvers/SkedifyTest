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
elseif ($m == 2){
	$max = 1000;
	$text = "view/caesar.php";
	$blokWeight = "normal";
	$caesarWeight = "bold";
}


$error = "Dit is geen geldige invoer, probeer opnieuw.";

if(isset($_POST["input-data"]) && !empty($_POST["input-data"])){
	if ($m == 1){			//Verwerking blokjes
		$data = intval($_POST["input-data"]);
		if(is_int($data) && $data >= 1 && $data <=100){
			$blokjes = 0;
			for($i=1; $i<=$data; $i++){
				$blokjes += pow($i,3);
			}
			$output = "Aantal blokjes nodig = <br />" . $blokjes;
		}
		else $output = $error;
	}
	elseif ($m == 2){	//Verwerking Caesar
		$arr = str_split($_POST["input-data"]);
		if($arr[1] == " "){		//sleutel van 1 cijfer
			$key = intval($arr[0]);
			$t = 2;
		}
		else{						//sleutel van 2 cijfers
			$key = intval($arr[0] . $arr[1]);
			$t = 3;
		}
		if(count($arr) > $t && is_int($key) && $key<=26 && $arr[$t-1] == " "){
			$output = "<p>Sleutel = " . $key . "</p><p>Vertaling = <br />";
			for ($i = $t; $i < count($arr); $i++){
				if(ctype_alpha($arr[$i]) && ctype_lower($arr[$i])){
					//kleine letters
					$output = "<p>" . $error;
					$kraak = "";
					$i = count($arr);
				}
				elseif(ctype_alpha($arr[$i]) && ctype_upper($arr[$i])){
					//hoofdletters
					$kraak = ord($arr[$i]) - $key;
					if($kraak == 64) $kraak = chr(32);
					elseif($kraak < 64) $kraak = chr($kraak + 27);
					else $kraak = chr($kraak);
				}
				elseif($arr[$i] == " "){
					//spaties
					$kraak = chr(91 - $key);
				}
				else{
					//andere tekens
					$kraak = $arr[$i];
				}
				$output .= $kraak;
			}
			$output .= "</p>";
		}
		else $output = $error;
	}
}
else $output = "  ";

include("view/view.php");

?>