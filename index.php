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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./index.php">METUBE</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./index.php">Home page <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Maybe fill with something?</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- nav bar ends here -->
 
<?php
echo '<h1> Welcome to Metube! </h1>
<h2>The place to share all your media.</h2>
<p class="text-warning" > MeTube is a website created for CPSC 4620. Here we will deminstrator or ability to use HTML, CSS, and PHP to share media files amongst different users. Here you can upload and download files, see what your friends are uploading and even download their content.
</p>';
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
