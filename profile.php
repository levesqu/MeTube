<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Message - MeTube</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>New Message</title>
    <link rel="stylesheet" type="text/css" href="css/default.css" />

    <!-- the nav bar ends here -->
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->
</head>

<body>


<?php
    $username = $_POST['username'];

    $queryProfile = "select * from account where username ='$username'";
    $profile = mysql_query($queryProfile);

    $profileInfo=mysql_fetch_row($profile);

    $age = $profileInfo[2];
    $workplace = $profileInfo[3];
    $aboutme = $profileInfo[4];
    $firstname = $profileInfo[5];
    $lastname = $profileInfo[6];


if($_SESSION['username'] == $username){
//    show my profile buttons
?>
    <div class="btn-group btn-group-justified">
    <a href="./channels.php" class="btn btn-default">My Channels</a>
    <a href="./profile_update.php" class="btn btn-default">Update Profile</a>
</div><br><br>
 <?php
}
else{
    // show generic buttons
    ?>
    <div class="btn-group btn-group-justified">
        <a href="./channels.php" class="btn btn-default">Channels</a>
    </div><br><br>
    <?php
}

?>
<div class="addmargin">

<h3><?php echo $username ?></h3>

    <h3><?php echo $firstname ?></h3>
    <h3><?php echo $lastname ?></h3>
    <h4>About:</h4>
    <p> <?php echo $aboutme ?>  </p>






</div>


</body>
</html>