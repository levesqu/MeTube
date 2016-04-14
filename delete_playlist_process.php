<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$playlistid=$_POST['playlistid'];

//insert into comments table
$query1 = "delete from playlists where username='$username' and playlistid='$playlistid'";
$query2 = "delete from playlistmedia where playlistid='$playlistid'";
$queryresult1 = mysql_query($query1)
	or die("Remove from Playlists error in delete_playlist_process.php " .mysql_error());
$queryresult2 = mysql_query($query2)
	or die("Remove from PlaylistMedia error in delete_playlist_process.php " .mysql_error());
?>

<meta http-equiv="refresh" content="0;url=playlists.php">
