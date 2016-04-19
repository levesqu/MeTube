<?php
session_start();
include_once "function.php";

/******************************************************
*
* upload document from user
*
*******************************************************/


$username=$_SESSION['username'];
$mediaid=$_POST['mediaid'];
$comment=mysql_real_escape_string($_POST['userComment']);


//insert into comments table
$insert = "insert into comments(commentid, mediaid, username, comment)".
			"values(NULL,'$mediaid','$username','$comment')";
$queryresult = mysql_query($insert)
	or die("Insert into Comments error in comment_process.php " .mysql_error());

?>

<meta http-equiv="refresh" content="0;url=media.php?id=<?php echo $mediaid;?>">
