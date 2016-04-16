<?php

include_once "function.php";

session_start();

    //$query = "tester";
    $username=$_SESSION['username'];

    $queryProfile = "select * from account where username ='$username'";
    $profile = mysql_query($queryProfile);

    $profileInfo=mysql_fetch_row($profile);


    $password = $profileInfo[1];
    $age = $profileInfo[2];
    $workplace = $profileInfo[3];

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
                <input class="form-control" id="inputPassword" type="password" name="password" value="<?php echo $password;?>")>
            </div>
        </div>

        <div class="form-group">
            <label for="inputAge" class="col-lg-2 control-label">Update Age:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputAge" type="text" name="age" value="<?php echo $age;?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputWorkplace" class="col-lg-2 control-label">Update Place of Work:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputWorkplace" type="text" name="workplace" value="<?php echo $workplace;?>">
            </div>
        </div>


        <div class="col-lg-10 col-lg-offset-2">
			<input name="submit" type="submit" class="btn btn-primary" value="Update">
        </div>
 
    </fieldset>
 </form>
</div>
</body>
</html>
