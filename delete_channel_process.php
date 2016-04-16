<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$channelid=$_POST['channelid'];

//insert into comments table
$query1 = "delete from channels where username='$username' and channelid='$channelid'";
$query2 = "delete from channelmedia where channelid='$channelid'";
$queryresult1 = mysql_query($query1)
	or die("Remove from Channels error in delete_channel_process.php " .mysql_error());
$queryresult2 = mysql_query($query2)
	or die("Remove from Channelmedia error in delete_channel_process.php " .mysql_error());
?>

<meta http-equiv="refresh" content="0;url=channels.php">
