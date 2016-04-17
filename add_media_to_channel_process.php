<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$channelid = $_POST['channelid'];

if (isset($_POST['mediaid']))
{
$mediaIdList=$_POST['mediaid'];
foreach ($mediaIdList as $mediaid)
{
	$media_insert = "insert into channelmedia(mapid, channelid, mediaid)".
						"values(NULL, $channelid, $mediaid)";
	$media = mysql_query($media_insert)
		or die("Insert into Channelmedia error in add_channel_process.php " . mysql_error());
}
}
?>

<meta http-equiv="refresh" content="0;url=channels.php">
