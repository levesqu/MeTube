<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile Update</title>
</head>

<body>

<form method="post" action="media_upload_process.php" enctype="multipart/form-data" >
 
  <p style="margin:0; padding:0">
  <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
   Update Profile: <label style="color:#663399"></label><br/>

   <form method="post" action="profile_update_process.php">
	<table width="100%">
		<tr>
			<td  width="20%"><label for="inputUsername" class="col-lg-2 control-label">Update Username:</label></td>
			<td width="80%"><input class="text" type="text" name="username"><br /></td>
		</tr>
		<br>

		<tr>
			<td  width="20%"><label for="inputPassword" class="col-lg-2 control-label">Update Password:</label></td>
			<td width="80%"><input class="text"  type="password" name="password"><br /></td>
		</tr>
		<br>

		<!-- label and input values need to be changed   -->
		<tr>
			<td  width="20%"><label for="inputAge" class="col-lg-2 control-label">Update Age:</label></td>
			<td width="80%"><input class="text"  type="text" name="age"><br /></td>
		</tr>
		<br>

		<!-- label and input values need to be changed   -->
		<tr>
			<td  width="20%"><label for="input_place_of_work" class="col-lg-2 control-label">Update Place of Work:</label></td>
			<td width="80%"><input class="text"  type="text" name="workplace"><br /></td>
		</tr>

		<tr>
			<td><input name="submit" type="submit" class="btn btn-primary" value="Update">
			</td>
		</tr>
	</table>
	</form>
  </p>
 
                
 </form>

</body>
</html>
