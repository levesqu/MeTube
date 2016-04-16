<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<link rel="stylesheet" type="text/css" href="css/default.css" />


<?php
session_start();

include_once "function.php";

if(isset($_POST['submit'])) {
		if($_POST['username'] == "" || $_POST['password'] == "") {
			$login_error = "One or more fields are missing.";
		}
		else {
			$check = user_pass_check($_POST['username'],$_POST['password']); // Call functions from function.php
			if($check == 1) {
				$login_error = "User ".$_POST['username']." not found.";
			}
			elseif($check==2) {
				$login_error = "Incorrect password.";
			}
			else if($check==0){
				$_SESSION['username']=ucfirst($_POST['username']); //Set the $_SESSION['username']
				header('Location: browse.php');
			}		
		}
}
 
?>

<body>

<!--the nav bar starts here -->
<?php require 'navigation.php'; ?>
<!-- nav bar ends here -->
<br>
	<form class="form-horizontal" method="post" action="<?php echo "login.php"; ?>">

<!--	<table width="100%">-->
<!--		<tr class="input-group col-lg-4">-->
<div class="input-group col-lg-4">
			<label for="username" class="control-label">Username: </label> &nbsp;
			<input class="form-control " title="username" type="text" name="username"><br />
        </div>
<!--		</tr>-->
		<div class="input-group col-lg-4">
			<label for="password" class=" control-label">Password: </label> &nbsp;
			<input class="form-control" title="password" type="password" name="password"><br />
            </div>
<!--		</tr>-->
<!--		<tr>-->
        
			&nbsp; <input name="submit" type="submit" class="btn btn-primary" value="Login">&nbsp;
			<input name="reset" type="reset" class="btn btn-default" value="Reset">
<!--		</tr>-->
<!--	</table>-->
	</form>

<?php
  if(isset($login_error))
   {  echo "<div id='passwd_result'>".$login_error."</div>";}
?>
</body>
</html>
