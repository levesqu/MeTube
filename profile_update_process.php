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

update_profile_info($_POST['username'], $_POST['password'], $_POST['age'], $_POST['workplace'], $_POST['aboutme'], $_POST['firstName'], $_POST['lastName'] );


	
	//You can process the error code of the $result here.
?>

<meta http-equiv="refresh" content="10;url=browse.php?result=<?php echo $result;?>">
