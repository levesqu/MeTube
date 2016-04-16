<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$mediaIdList=$_POST['mediaid'];
$channeltitle=$_POST['channelTitle'];
$channeldescription=$_POST['channelDescription'];

//insert into comments table
$insert = "insert into channels(channelid, channeltitle, channeldescription, username)".
			"values(NULL,'$channeltitle','$channeldescription','$username');";
$queryresult = mysql_query($insert)
	or die("Insert into Channels error in add_channel_process.php " .mysql_error());

$channel_query = "select * from channels where username='$username' order by channelid desc limit 1;";
$channel_result = mysql_query($channel_query);
$channel_row = mysql_fetch_row($channel_result);
$channelid = $channel_row[0];

foreach ($mediaIdList as $mediaid)
{
	$media_insert = "insert into channelmedia(mapid, channelid, mediaid)".
						"values(NULL, $channelid, $mediaid)";
	$media = mysql_query($media_insert)
		or die("Insert into Channelmedia error in add_channel_process.php " . mysql_error());
}
?>

<meta http-equiv="refresh" content="0;url=channels.php">
