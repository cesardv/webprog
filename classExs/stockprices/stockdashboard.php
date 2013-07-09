<?php
/* StockDashboard.php*/
require_once("ystock.php");
$user = "";

if(!validateEmail($_POST['email'])){
	echo "<h1>You're not authorized to log in!</h1>"
}
else
{	
	$user = $_POST['email'];
	$url = 'http://finance.yahoo.com/d/quotes.csv?s=AAPL&f=snd1lyr';
	$returned  = file_get_contents( $url );
	// separate into lines
	$returnedLns = str_getcsv($returned, "\n"); 
	
	foreach( $returnedLns as $line ) {
		$contents = str_getcsv( $line );
	   // Now, is an array of the comma-separated contents of a line
	   $test = $contents[0];
	}
}

function ($email) {
	return true;	
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recent-Time Stocks</title>
</head>
<body>
    <h1>Welcome, <?php echo $user ?></h1>
    <p><?php echo $test ?></p>
</body>
</html>
