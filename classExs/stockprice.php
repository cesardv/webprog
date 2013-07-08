
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recent-Time Stock Prices</title>
    <script src="./validateEmail.js">
    </script>
</head>
<body>
	<div id="main">
		<header>
		<h1>Recent-Time Stock Prices</h1>	
		</header>
	    <form id="loginform" name="loginform" action="stockdashboard.php" onsubmit="validateLogin()">
	    <label for="email">Username </label>
	    <input type="text" name="email" /><br/>
	    <label for="password">Password </label>
	    <input type="password" name="password" /><br/>
	    <input type="submit" />
		 </form>
	 </div>
</body>
</html>