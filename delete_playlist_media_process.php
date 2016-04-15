<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$mediaid=$_POST['mediaid'];
$playlistid=$_POST['playlistid'];

//insert into comments table
$query = "delete from playlistmedia where playlistid=$playlistid and mediaid=$mediaid";
$queryresult = mysql_query($query)
	or die("Remove from Playlistmedia error in delete_playlist_media_process.php " .mysql_error());

?>

<meta http-equiv="refresh" content="0;url=playlist.php?id=<?php echo $playlistid; ?>">
