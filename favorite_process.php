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

//insert into comments table
$insert = "insert into favorites(favoriteid, username, mediaid)".
			"values(NULL,'$username','$mediaid')";
$queryresult = mysql_query($insert)
	or die("Insert into Favorites error in favorite_process.php " .mysql_error());

?>

<meta http-equiv="refresh" content="0;url=media.php?id=<?php echo $mediaid;?>">
