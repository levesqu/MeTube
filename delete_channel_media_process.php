<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$mediaid=$_POST['mediaid'];
$channelid=$_POST['channelid'];

//insert into comments table
$query = "delete from channelmedia where channelid=$channelid and mediaid=$mediaid;";
$queryresult = mysql_query($query)
	or die("Remove from Channelmedia error in delete_channel_media_process.php " .mysql_error());

?>

<meta http-equiv="refresh" content="0;url=channel.php?id=<?php echo $channelid; ?>">
