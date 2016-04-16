<?php
include "mysqlClass.inc.php";
session_start();

    //$query = "tester";
    $username=$_SESSION['username'];

    //instead of blah i need to give it real username
    $queryPassword = "select workplace from account where username='$username'";
    $queryAge = "select age from account where username='$username'";
    $queryWorkPlace = "select workplace from account where username='$username'";

    $password = mysql_query($queryPassword);
    $age = mysql_query($queryAge);
    $workplace = mysql_query($queryWorkPlace);

    $passwordrow = mysql_fetch_array($password);
    $agerow = mysql_fetch_array($age);
    $workplacerow = mysql_fetch_array($workplace);
    //$queryresult = mysql_query($query);


    /*$eventid = $_GET['id'];
    $field = $_GET['field'];
    $result = mysql_query("SELECT $field FROM `events` WHERE `id` = '$eventid' ");
    $row = mysql_fetch_array($result);
    echo $row[$field];*/


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
<title>Profile Update</title>

    <!--the nav bar starts here -->
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->

</head>

<body>
<div class="form-group">
<form class="form-horizontal" method="post"  action="profile_update_process.php" enctype="multipart/form-data" >
    <fieldset>
        <legend>Update Profile</legend>
        <!-- in here there was a second <form> tag and the top form tag at media upload procress in it not sure if that's what was meant to be but I changed it-->
	<table width="100%">
        <div class="form-group">
			<label for="inputUsername" class="col-lg-2 control-label">Update Username:</label>
            <div class="col-lg-10">
		    	<input class="form-control" id="inputUsername" type="text" name="username" value="<?php echo $username;?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Update Password:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputPassword" type="password" name="password" value="<?php echo $passwordrow[0];?>")>
            </div>
        </div>

        <div class="form-group">
            <label for="inputAge" class="col-lg-2 control-label">Update Age:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputAge" type="text" name="age" value="<?php echo $agerow[0];?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputWorkplace" class="col-lg-2 control-label">Update Place of Work:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputWorkplace" type="text" name="workplace" value="<?php echo $workplacerow[0];?>">
            </div>
        </div>

<!--
        <tr>
			<td  width="20%"><label for="inputPassword" class="col-lg-2 control-label">Update Password:</label></td>
			<td width="80%"><input class="text"  type="password" name="password"><br /></td>
		</tr>
		<br>-->

		<!-- label and input values need to be changed   -->
		<!--<tr>
			<td  width="20%"><label for="inputAge" class="col-lg-2 control-label">Update Age:</label></td>
			<td width="80%"><input class="text"  type="text" name="age"><br /></td>
		</tr>
		<br>-->

		<!-- label and input values need to be changed   -->
		<!--<tr>
			<td  width="20%"><label for="input_place_of_work" class="col-lg-2 control-label">Update Place of Work:</label></td>
			<td width="80%"><input class="text"  type="text" name="workplace"><br /></td>
		</tr>-->

        <div class="col-lg-10 col-lg-offset-2">
			<input name="submit" type="submit" class="btn btn-primary" value="Update">
        </div>
 
    </fieldset>
 </form>
</div>
</body>
</html>
