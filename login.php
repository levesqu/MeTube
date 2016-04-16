<!DOCTYPE html>
<html lang="en">
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

	<table width="100%">
		<tr>
			<td  width="20%"><label for="inputUsername" class="col-lg-2 control-label">Username:</label></td>
			<td width="80%"><input class="form-control" title="username" type="text" name="username"><br /></td>
		</tr>
		<tr>
			<td  width="20%"><label for="inputPassword" class="col-lg-2 control-label">Password</label></td>
			<td width="80%"><input class="form-control" title="password" type="password" name="password"><br /></td>
		</tr>
		<tr>
        
			<td>&nbsp<input name="submit" type="submit" class="btn btn-primary" value="Login">&nbsp
			<input name="reset" type="reset" class="btn btn-default" value="Reset"></td>
		</tr>
	</table>
	</form>

<?php
  if(isset($login_error))
   {  echo "<div id='passwd_result'>".$login_error."</div>";}
?>
</body>
</html>
