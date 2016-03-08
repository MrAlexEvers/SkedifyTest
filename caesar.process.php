<?php
//Verwerking Caesar
	$arr = str_split($_POST["input-data"]);
	if($arr[1] == " "){		//sleutel van 1 cijfer
		$key = intval($arr[0]);
		$t = 2;
	}
	else{						//sleutel van 2 cijfers
		$key = intval($arr[0] . $arr[1]);
		$t = 3;
	}
	if(count($arr) > $t && is_int($key) && $key<=26 && $key>=0 && $arr[$t-1] == " "){
		$output = "<p>Sleutel = " . $key . "</p><p>Ontcijferde boodschap = <br />";
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