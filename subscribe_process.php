<?php
session_start();
include_once "function.php";

/******************************************************
*
* upload document from user
*
*******************************************************/

$username=$_SESSION['username'];
$channelid=$_POST['channelid'];
$mediaid=$_POST['mediaid'];

//insert into comments table
$insert = "insert into subs(subid, channelid, username)".
			"values(NULL,'$channelid','$username')";
$queryresult = mysql_query($insert)
	or die("Insert into Subs error in subscribe_process.php " .mysql_error());

?>

<meta http-equiv="refresh" content="0;url=media.php?id=<?php echo $mediaid;?>">
