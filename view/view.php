<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
		<link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
		<link href='view/css/test.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
	
        <header>
			<h1>Test voor <img height="35px" width="150px" src="images/skedify-logo-text.svg"></img></h1>
		</header>
		
		<div id="nav-bar">
			<p><a style="font-weight:<?php echo $blokWeight; ?>" href="test.php?mode=1">Blokjes stapelen</a> <a style="font-weight:<?php echo $caesarWeight; ?>" href="test.php?mode=2">Caesar codering</a></p>
		</div>
		
		<div id="container">
			<div id="content">
				<div id="left">
					<p><?php include($text); ?></p>
				</div>
				<div id="right">
					<div id="input-box">
						<form id="input-form" action="test.php?mode=<?php echo $m; ?>" method="post">
							<p>Input:<p>
							<input type="text" name="input-data" id="input-data" maxlength="<?php echo $max; ?>" />
							<input type="submit" id="submit" value="Verwerk" /> 
						</form>
					</div>
					<div id="output-box">
						<p><?php echo $output; ?></p>
					</div>
				</div>
			</div>
		</div>
		
		<footer>
			<p>&mdash; Alex Evers &mdash;
		</footer>
		
    </body>
</html>