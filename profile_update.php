<?php

include_once "function.php";

session_start();

    //$query = "tester";
    $username=$_SESSION['username'];



    if(isset($_POST['submit'])) {
        if( $_POST['password1'] != $_POST['password2']) {
            $register_error = "Updated Passwords don't match! Please Try Again.";
        }
        else {
            $check = update_profile_info($username, $_POST['password1'], $_POST['age'], mysql_real_escape_string($_POST['workplace']), mysql_real_escape_string($_POST['aboutme']), mysql_real_escape_string($_POST['firstName']), mysql_real_escape_string($_POST['lastName']) );
            if($check == 1){
                //echo "Register succeeds";
                ?>
						<form action="profile.php" method="post" id="refreshProfileForm">
							<input type="hidden" name="username" value="<?php echo $username; ?>" />
						</form>

                <script type="text/javascript">
						document.getElementById("refreshProfileForm").submit();
                </script>
                <?php
            }

        }
}

    $queryProfile = "select * from account where username ='$username'";
    $profile = mysql_query($queryProfile);

    $profileInfo=mysql_fetch_row($profile);


    $password = $profileInfo[1];
    $age = $profileInfo[2];
    $workplace = $profileInfo[3];
    $aboutme = $profileInfo[4];
    $firstname = $profileInfo[5];
    $lastname = $profileInfo[6];





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
<form class="form-horizontal" method="post" action="profile_update.php" enctype="multipart/form-data" >
    <fieldset>
        <legend>Update Profile</legend>
	<table width="100%">
        <div class="form-group">
			<label for="inputUsername" class="col-lg-2 control-label">Username:</label>
            <div class="col-lg-10">
		    	<input class="form-control" id="inputUsername" type="text" name="username" value="<?php echo $username;?>"  disabled="">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword1" class="col-lg-2 control-label">Password:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputPassword1" type="password" name="password1" value="<?php echo $password;?>")>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword2" class="col-lg-2 control-label">Repeat Password:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputPassword2" type="password" name="password2" value="<?php echo $password;?>")>
            </div>
        </div>

        <div class="form-group">
            <label for="inputFirstName" class="col-lg-2 control-label">First Name:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputFirstName" type="text" name="firstName" value="<?php echo $firstname;?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputLastName" class="col-lg-2 control-label">Last Name:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputLastName" type="text" name="lastName" value="<?php echo $lastname;?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputAge" class="col-lg-2 control-label">Age:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputAge" type="text" name="age" value="<?php echo $age;?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputWorkplace" class="col-lg-2 control-label">Place of Work:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputWorkplace" type="text" name="workplace" value="<?php echo $workplace;?>">
            </div>
        </div>

        <div class="form-group">
            <label for="aboutme" class="col-lg-2 control-label">About Me:</label>
            <div class="col-lg-10">
                <input class="form-control" id="aboutme" type="text" name="aboutme" value="<?php echo $aboutme;?>">
            </div>
        </div>


        <div class="col-lg-10 col-lg-offset-2">
			<input name="submit" type="submit" class="btn btn-primary" value="Update">
        </div>
 
    </fieldset>
 </form>


    <?php
    if(isset($register_error))
    {  echo "<div class='text-danger' id='passwd_result'><strong> Profile Update Error: ".$register_error."</strong></div>";}
    ?>

</div>
</body>
</html>
