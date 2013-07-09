<?php
/* StockDashboard.php*/
/*
stock data we query for per SYMBOL [s0]/Co. Name [n0]: 
**note codes that end in 0/zero can be written as just s0 => s, but the zero is a good divider for readability 
-Price (aka "Last Trade Price Only" (no time info)) - l1 (L1)
-Name [n0]
-opening price [o0] ??
-day high [h0]
-day low [g0]
-52 week high (aka Year high) [k0]
-52 week low [j0]
-day volume [v0]

*/
require_once("ystock.php");
$user = "";

if(!validateEmail($_REQUEST['email'])){
	echo "<h1>You're not authorized to log in!</h1>";
}
else
{	
	$user = $_REQUEST['email'];
	$url = 'http://finance.yahoo.com/d/quotes.csv?s=AAPL&f=snd1lyr';
	$returned  = file_get_contents( $url );
	// separate into lines
	$returnedLns = str_getcsv($returned, "\n"); 
	
	foreach( $returnedLns as $line ) {
		$contents = str_getcsv( $line );
	   // Now, is an array of the comma-separated contents of a line
	   // $test = print_r($contents); print to beginning of body
	}
}

/* normally you'd hit a database to validate... */
function validateEmail($email) {
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
	<hr/>
	<form id="symbolsinput" name="symbolsinput" action="stockdashboard.php">
		<label for="symbols">Please enter the ticker symbols to quote (Separate by commas/10 max):</label><br/>
		<input type="text" name="symbols" maxLength="50"/>
		<input type="submit" value="Quote"/>
	</form>
    <p>Results:</p>
	<?php 
		if(empty($stocks)){
			echo "<p>No result data to display</p>";
		}
		else{
			
			$tablebegin = "<table id='stocksdata'><thead><tr><th>Symbol</th><th>Name</th><th>Price</th><th>Open Price</th><th>Day High</th><th>Day Low</th><th>Day Volume</th><th>Year High</th><th>Year Low</th></tr></thead>";
			/* just finished thead */
			$rows = "";
			foreach($stocks as $co){
				$rows += "<tr><td>" . $co["symbol"] . "</td><td>"  . $co["name"] . "</td><td>" . $co["price"] . "</td><td>" . $co["oprice"] . "</td><td>" . $co["dayhigh"] . "</td><td>" . $co["daylow"] . "</td><td>" . $co["dayvol"] . "</td><td>" . $co["yrhi"] . "</td><td>" . $co["yrlow"] . "</td></tr>"; 
			}
			/* finish/close table*/
			$tablebegin += $rows . "</table>";
			echo $tablebegin;
		}
	
	?>
</body>
</html>
