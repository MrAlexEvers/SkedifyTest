<?php
//Verwerking blokjes
	$data = intval($_POST["input-data"]);
	if(is_int($data) && $data >= 1 && $data <=100){
		$blokjes = 0;
		for($i=1; $i<=$data; $i++){
			$blokjes += pow($i,3);
		}
		$output = "Aantal blokjes nodig = <br />" . $blokjes;
	}
	else $output = $error;