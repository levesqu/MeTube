<?php
session_start();
include_once "function.php";

/******************************************************
*
* upload document from user
*
*******************************************************/



$username=$_SESSION['username'];
// find his info in the database
// update it




update_profile_info($username, $_POST['password'], $_POST['age'], mysql_real_escape_string($_POST['workplace']), mysql_real_escape_string($_POST['aboutme']), mysql_real_escape_string($_POST['firstName']), mysql_real_escape_string($_POST['lastName']) );


	
	//You can process the error code of the $result here.
?>

<meta http-equiv="refresh" content="0;url=my_media.php?result=<?php echo $result;?>">
