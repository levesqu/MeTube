<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<link rel="stylesheet" type="text/css" href="css/default.css" />
<body>


<?php
session_start();

include_once "function.php";

?>
<!--the nav bar starts here -->
<?php require 'navigation.php'; ?>
<!-- nav bar ends here -->
<?php

if(isset($_POST['submit'])) {
	if( $_POST['password1'] != $_POST['password2']) {
		$register_error = "Passwords don't match. Try again?";
	}
	else {
		$check = user_exist_check($_POST['username'], $_POST['password1'], $_POST['firstName'], $_POST['lastName'], $_POST['age']);
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
		<input  type="password" class="col-lg-2 control-label" name="password1"> <br><br>
	<label for="inputRepeatPassword" class="col-lg-2 control-label">Repeat password: </label>
		<input type="password" class="col-lg-2 control-label"name="password2"> <br><br>
    <label for="inputFirstName" class="col-lg-2 control-label">First Name: </label>
        <input type="text" class="col-lg-2 control-label"name="firstName"> <br><br>
    <label for="inputLastName" class="col-lg-2 control-label">Last Name: </label>
        <input type="text" class="col-lg-2 control-label"name="lastName"> <br><br>
    <label for="inputAge" class="col-lg-2 control-label">Age: </label>
        <input type="text" class="col-lg-2 control-label"name="age"> <br><br>

    &nbsp<input name="submit" type="submit" class="btn btn-primary"value="Submit">
</form>

<?php
  if(isset($register_error))
   {  echo "<div id='passwd_result'> register_error:".$register_error."</div>";}
?>

</body>
</html>
