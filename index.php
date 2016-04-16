<!DOCTYPE html>
<html lang="en">
<head> 
<title>MeTube</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<link rel="stylesheet" type="text/css" href="css/default.css" />
<body>

<!--the nav bar starts here -->
<?php require 'navigation.php'; ?>
<!-- nav bar ends here -->
 
<?php
echo '<h1> Welcome to Metube! </h1>
<h2>The place to share all your media.</h2>
<p class="text-warning" >  Information about the website </p>';
?>
<div class="container-fluid">
<form action="login.php" method="post">
	
	<input type="submit" class="btn btn-primary"  VALUE = "Log in" >
</form>

<form action="register.php" method="post">
	<br>
	<input type="submit" class="btn btn-primary"  VALUE = "Register" >
</form>
</div>

</body>
</html>
