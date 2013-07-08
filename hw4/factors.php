<?php
/**
 * Cesar Velez
 * Date: 7/5/13
 * Factors.php - Generates a prime factorization of a positive integer number.
 */

$n = $_GET['number'] ? $_GET['number'] : "NaN";
$orig = $n;
$output = $n == "NaN"? "NaN" : "";
/* todo: some validation of sorts... should also be done client side...*/

$fac = 2;
$factors = array();

while ($fac * $fac <= $n){

    if($n % $fac == 0){

        $factors[] = $fac;
        $n /= $fac;
    }
    else
        $fac++;

}

$factors[] = $n;

foreach ($factors as $f){
    $output = $output . $f . " * ";
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Cesar Velez | Hw4 - Factors.php</title>
    <script>
        function validate(){

        }

    </script>
</head>
<body>
<h1>Factors</h1>
<p>Please enter a number below to get it's prime factors:</p>
<form action="factors.php" method="GET">
    Enter a positive number: <input type="text" name="number">
    <input type="submit">
</form>
<p>
    <?php
    if($orig != "NaN"){
        echo "The factors of " . $orig . " are: ";
        echo $output;
    }
    ?>
</p>
</body>
</html>