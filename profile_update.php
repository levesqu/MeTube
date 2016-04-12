<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
<title>Profile Update</title>

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
                    <li class="active"><a href="./browse.php">Home page <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Maybe fill with something?</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./profile_update.php">Update Profile</a></li>
                    <li><a href="./login.php">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- nav bar ends here -->

</head>

<body>
<div class="form-group">
<form class="form-horizontal" method="post" action="media_upload_process.php" enctype="multipart/form-data" >
 
  <p style="margin:0; padding:0">
  <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
   Update Profile: <label style="color:#663399"></label><br/>

   <form method="post" action="profile_update_process.php">
	<table width="100%">
		<tr>
			<label for="inputUsername" class="col-lg-2 control-label">Update Username:</label>
            <div class="col-lg-10">
			<td width="80%"><input class="form-control" id="inputUsername" type="text" name="username" placeholder="Username""><br /></td>
            </div>
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
