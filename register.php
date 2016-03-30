<!DOCTYPE html>
<html lang="en">
<head> 
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
session_start();

include_once "function.php";

if(isset($_POST['submit'])) {
	if( $_POST['passowrd1'] != $_POST['passowrd2']) {
		$register_error = "Passwords don't match. Try again?";
	}
	else {
		$check = user_exist_check($_POST['username'], $_POST['passowrd1']);	
		if($check == 1){
			//echo "Register succeeds";
			$_SESSION['username']=$_POST['username'];
			header('Location: browse.php');
		}
		else if($check == 2){
			$register_error = "Username already exists. Please user a different username.";
		}
	}
}

?>
<form action="register.php" method="post">
	<label for="inputUsername" class="col-lg-2 control-label">Username:</label>
		<input type="text" class="col-lg-2 control-label" name="username"> <br><br>
	<label for="inputPassword" class="col-lg-2 control-label">Create Password: </label>
		<input  type="password" class="col-lg-2 control-label" name="passowrd1"> <br><br>
	<label for="inputRepeatPassword" class="col-lg-2 control-label">Repeat password: </label>
		<input type="password" class="col-lg-2 control-label"name="passowrd2"> <br><br>  
	&nbsp<input name="submit" type="submit" class="btn btn-primary"value="Submit">
</form>

<?php
  if(isset($register_error))
   {  echo "<div id='passwd_result'> register_error:".$register_error."</div>";}
?>

</body>
</html>
