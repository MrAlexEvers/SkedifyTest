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
	if ($m == 1){
		include("blokjes.process.php");
	}
	elseif ($m == 2){
		include("caesar.process.php");
	}
}
else $output = "  ";

include("view/view.php");

?>