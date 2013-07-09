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
$error = "";
//$stocks = array(); /* will store associative arrays for each stock */

if(!validateEmail($_REQUEST['email'])){
	echo "<h1>You're not authorized to log in!</h1>";
}
else
{	
	$user = $_REQUEST['email'];
	$symbolsInput = $_REQUEST["symbols"];
	$symArr = str_getcsv( $symbolsInput );
	if(count($symArr) < 1){
		$error = "Invalid input in symbols. Make sure your symbols are correct and separated by commas.<br/>For Ex: 'GOOG,MSFT,AAPL'";
		return 1;
	}
	else
	{
		$stocks = multiRequest($symArr, "s0n0l1o0h0g0v0k0j0");
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
	<form id="symbolsinput" name="symbolsinput" action="stockdashboard.php" method="GET">
		<label for="symbols">Please enter the ticker symbols to quote (Separate by commas/10 max):</label><br/>
		<input type="text" name="symbols" maxLength="50"/>
		<input type="submit" value="Quote"/>
		<input hidden name="email" value="<?php echo $user ?>" />
	</form>
    <p>Results:</p>
	<?php 
		if(empty($stocks)){
			echo "<p>No result data to display.</p>";
			echo $error != "" ? $error : "";
		}
		else{
			
			$tablebegin = "<table id='stocksdata'><thead><tr><th>Symbol</th><th>Name</th><th>Price</th><th>Open Price</th><th>Day High</th><th>Day Low</th><th>Day Volume</th><th>Year High</th><th>Year Low</th></tr></thead>";
			/* just finished thead */
			$rows = "";
			foreach($stocks as $co){
				$rows += "<tr><td>" . $co["symbol"] . "</td><td>"  . $co["name"] . "</td><td>" . $co["price"] . "</td><td>" . $co["oprice"] . "</td><td>" . $co["dayhigh"] . "</td><td>" . $co["daylow"] . "</td><td>" . $co["volume"] . "</td><td>" . $co["yrhigh"] . "</td><td>" . $co["yrlow"] . "</td></tr>"; 
			}
			/* finish/close table*/
			$tablebegin += $rows . "</table>";
			echo $tablebegin;
		}
	
	?>
</body>
</html>
