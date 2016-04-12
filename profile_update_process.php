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

$u_username = $_POST['username'];
$u_password = $_POST['password'];
$u_age = $_POST['age'];
$u_workplace = $_POST['workplace'];

update_profile_info($u_username, $u_password, $u_age, $u_workplace);


	
	//You can process the error code of the $result here.
?>

<meta http-equiv="refresh" content="0;url=browse.php?result=<?php echo $result;?>">
